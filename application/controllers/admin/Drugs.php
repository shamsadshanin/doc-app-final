<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drugs extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
        //check auth
        if (is_staff()) {
            if (check_staff_permissions('drugs') != 1 ) {
                redirect(base_url('admin/dashboard/user'));
            }
            
        }
        if (!is_staff() && !is_user() && !is_admin()) {
            redirect(base_url());
        }
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Drugs';      
        $data['page'] = 'Drugs';   
        $data['drug'] = FALSE;


        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/drugs');
        $total_row = $this->admin_model->all_get_drugs($total=1, 0, 0);
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
        $data['drugs']=$this->admin_model->all_get_drugs($total=0, $config['per_page'], $page * $config['per_page']);



        //echo  '<pre>'; print_r($data['drugs']); exit();
        $data['main_content'] = $this->load->view('admin/user/drugs',$data,TRUE);
        $this->load->view('admin/index',$data);
    }


    public function add()
    {	
        if($_POST)
        {   
            $id = $this->input->post('id', true);

            if (user()->role == 'admin') {
                $is_admin = 1;
            }else{
                $is_admin = 0;
            }

            //validate inputs
            $this->form_validation->set_rules('name', trans('name'), 'required');

            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url('admin/drugs'));
            } else {
                if(user()->role == 'staff'){$user_id = user()->user_id;}else{$user_id = user()->id;}
                $data=array(
                    'user_id' => $user_id,
                    'name' => $this->input->post('name', true),
                    'generic_name' => $this->input->post('generic_name', true),
                    'brand_name' => $this->input->post('brand_name', true),
                    'details' => $this->input->post('details', true),
                    'is_admin' => $is_admin,
                );
                $data = $this->security->xss_clean($data);
                
                //if id available info will be edited
                if ($id != '') {
                    $this->admin_model->edit_option($data, $id, 'drugs');
                    $this->session->set_flashdata('msg', trans('updated-successfully')); 
                } else {
                    $id = $this->admin_model->insert($data, 'drugs');
                    $this->session->set_flashdata('msg', trans('inserted-successfully')); 
                }
                redirect(base_url('admin/drugs'));

            }
        }      
        
    }

    public function edit($id)
    {  
        $data = array();
        $data['page_title'] = 'Edit';   
        $data['drug'] = $this->admin_model->select_option($id, 'drugs');
        $data['main_content'] = $this->load->view('admin/user/drugs',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'drugs');
        $this->session->set_flashdata('msg', trans('activate-successfully')); 
        redirect(base_url('admin/drugs'));
    }

    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'drugs');
        $this->session->set_flashdata('msg', trans('deactivate-successfully')); 
        redirect(base_url('admin/drugs'));
    }

    public function delete($id)
    {
        $this->admin_model->delete($id,'drugs'); 
        echo json_encode(array('st' => 1));
    }

}
	

