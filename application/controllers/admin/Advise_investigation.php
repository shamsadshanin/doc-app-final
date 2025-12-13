<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advise_investigation extends Home_Controller {

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
        $data['page_title'] = 'Advise investigation';    
        $data['page'] = 'Prescription Settings';   
        $data['advise_investigation'] = FALSE;

        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/advise_investigation');
        $total_row = $this->admin_model->get_all('advise_investigations', $total=1, 0, 0);
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
        $data['advise_investigations']=$this->admin_model->get_all('advise_investigations', $total=0, $config['per_page'], $page * $config['per_page']);


        $data['main_content'] = $this->load->view('admin/user/advise_investigation',$data,TRUE);
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
                redirect(base_url('admin/advise_investigation'));
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
                    $this->admin_model->edit_option($data, $id, 'advise_investigations');
                    $this->session->set_flashdata('msg', trans('updated-successfully')); 
                } else {
                    $id = $this->admin_model->insert($data, 'advise_investigations');
                    $this->session->set_flashdata('msg', trans('inserted-successfully')); 
                }
                redirect(base_url('admin/advise_investigation'));

            }
        }      
        
    }

    public function edit($id)
    {  
        $data = array();    
        $data['page'] = 'Prescription Settings';   
        $data['page_title'] = 'Edit';   
        $data['advise_investigation'] = $this->admin_model->select_option($id, 'advise_investigations');
        $data['main_content'] = $this->load->view('admin/user/advise_investigation',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'advise_investigations');
        $this->session->set_flashdata('msg', trans('updated-successfully')); 
        redirect(base_url('admin/advise_investigation'));
    }

    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'advise_investigations');
        $this->session->set_flashdata('msg', trans('updated-successfully')); 
        redirect(base_url('admin/advise_investigation'));
    }

    public function delete($id)
    {
        $this->admin_model->delete($id,'advise_investigations'); 
        echo json_encode(array('st' => 1));
    }

}
	

