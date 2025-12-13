<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advises extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
        //check auth
        if (is_staff()) {
            if (check_staff_permissions('prescription-settings') != 1 ) {
                redirect(base_url('admin/dashboard/user'));
            }
            
        }
        if (!is_staff() && !is_user()) {
            redirect(base_url());
        }
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Advises';      
        $data['page'] = 'Prescription Settings';   
        $data['advise'] = FALSE;

        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/advises');
        $total_row = $this->admin_model->get_all('advises', $total=1, 0, 0);
        $config['total_rows'] = $total_row;
        $config['per_page'] = 12;
        $this->pagination->initialize($config);
        $page = $this->security->xss_clean($this->input->get('page'));
        if (empty($page)) {
            $page = 0;
        }
        if ($page != 0) {
            $page = $page - 1;
        }
        $data['adviseses']=$this->admin_model->get_all('advises', $total=0, $config['per_page'], $page * $config['per_page']);


        $data['main_content'] = $this->load->view('admin/user/advises',$data,TRUE);
        $this->load->view('admin/index',$data);
    }


    public function add()
    {	
        if($_POST)
        {   
            $id = $this->input->post('id', true);

            //validate inputs
            $this->form_validation->set_rules('name', trans('name'), 'required');

            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url('admin/advises'));
            } else {

                if(user()->role == 'staff'){$user_id = user()->user_id;}else{$user_id = user()->id;}
                $data=array(
                    'user_id' => $user_id,
                    'name' => $this->input->post('name', true),
                    'details' => $this->input->post('details', true)
                );
                $data = $this->security->xss_clean($data);
                
                //if id available info will be edited
                if ($id != '') {
                    $this->admin_model->edit_option($data, $id, 'advises');
                    $this->session->set_flashdata('msg', trans('updated-successfully')); 
                } else {
                    $id = $this->admin_model->insert($data, 'advises');
                    $this->session->set_flashdata('msg', trans('inserted-successfully')); 
                }
                redirect(base_url('admin/advises'));

            }
        }      
        
    }

    public function edit($id)
    {  
        $data = array();    
        $data['page'] = 'Prescription Settings';   
        $data['page_title'] = 'Edit';   
        $data['advise'] = $this->admin_model->select_option($id, 'advises');
        $data['main_content'] = $this->load->view('admin/user/advises',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'advises');
        $this->session->set_flashdata('msg', trans('updated-successfully')); 
        redirect(base_url('admin/advises'));
    }

    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'advises');
        $this->session->set_flashdata('msg', trans('updated-successfully')); 
        redirect(base_url('admin/advises'));
    }

    public function delete($id)
    {
        $this->admin_model->delete($id,'advises'); 
        echo json_encode(array('st' => 1));
    }

}
	

