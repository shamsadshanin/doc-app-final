<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Operation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('operation_model');
        $this->load->model('admin_model');
        $this->load->library('image_lib');
    }

    public function index()
    {
        $data = array();
        $data['page_title'] = 'Operations';      
        $data['page'] = 'Operations';   
        $data['operation'] = FALSE;
        $data['operations'] = $this->operation_model->get_operations();
        $data['patients'] = $this->admin_model->select_by_chamber('patientses');
        $data['main_content'] = $this->load->view('admin/user/operations',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function add()
    {   
        if($_POST)
        {   
            $id = $this->input->post('id', true);

            //validate inputs
            $this->form_validation->set_rules('title', trans('title'), 'required|max_length[255]');
            $this->form_validation->set_rules('patient_id', trans('patient'), 'required');

            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url('admin/operation'));
            } else {
                
                $data=array(
                    'user_id' => user()->id,
                    'title' => $this->input->post('title', true),
                    'patient_id' => $this->input->post('patient_id', true),
                    'description' => $this->input->post('description', true),
                    'share_token' => hash('sha1', time()),
                    'created_at' => my_date_now()
                );
                $data = $this->security->xss_clean($data);
                
                //if id available info will be edited
                if ($id != '') {
                    $this->operation_model->edit($data, $id);
                    $this->session->set_flashdata('msg', trans('updated-successfully')); 
                } else {
                    $id = $this->operation_model->insert($data);
                    $this->session->set_flashdata('msg', trans('inserted-successfully')); 
                }
                redirect(base_url('admin/operation'));

            }
        }      
        
    }

    public function edit($id)
    {  
        $data = array();
        $data['page_title'] = 'Edit';   
        $data['operation'] = $this->operation_model->get_operation($id);
        $data['patients'] = $this->admin_model->select_by_chamber('patientses');
        $data['main_content'] = $this->load->view('admin/user/operations',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function delete($id)
    {
        $this->operation_model->delete($id);
        echo json_encode(array('st' => 1));
    }


    public function view($id)
    {
        $data = array();
        $data['page_title'] = 'View Operation';   
        $data['operation'] = $this->operation_model->get_operation($id);
        $data['media'] = $this->operation_model->get_media($id);
        $data['main_content'] = $this->load->view('admin/user/view_operation',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function upload_media($operation_id)
    {
        $config['upload_path']          = './uploads/media/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {

            $upload_data = $this->upload->data();

            $thumb_config['image_library'] = 'gd2';
            $thumb_config['source_image'] = $upload_data['full_path'];
            $thumb_config['create_thumb'] = TRUE;
            $thumb_config['maintain_ratio'] = TRUE;
            $thumb_config['width']         = 250;
            $thumb_config['height']       = 250;

            $this->image_lib->initialize($thumb_config);
            $this->image_lib->resize();

            $thumb_path = 'uploads/media/' . $upload_data['raw_name'] . '_thumb' . $upload_data['file_ext'];

            $data = array(
                'operation_id' => $operation_id,
                'file_path' => 'uploads/media/' . $upload_data['file_name'],
                'thumb_path' => $thumb_path,
                'created_at' => my_date_now()
            );

            $this->operation_model->insert_media($data);

            echo json_encode(array('st' => 1));
        }
    }

    public function delete_media($id)
    {
        $media = $this->operation_model->get_media_by_id($id);
        unlink($media->file_path);
        unlink($media->thumb_path);
        $this->operation_model->delete_media($id);
        echo json_encode(array('st' => 1));
    }

    public function generate_share_link($id)
    {
        $token = hash('sha1', time());
        $this->operation_model->update_operation(array('share_token' => $token), $id);
        echo json_encode(array('token' => $token));
    }
}
