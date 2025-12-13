<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_templates extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
        //check auth
        if (!is_admin()) {
            redirect(base_url());
        }
    }


    public function index()
    {
        
        $data = array();
        $data['page_title'] = 'Email Template';
        $data['templates'] = $this->admin_model->select_asc('email_templates');
        $data['template'] = $this->admin_model->get_email_by_slug('verification');
        $data['main_content'] = $this->load->view('admin/email_templates',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function template($slug='')
    {
        
        $data = array();
        $data['page_title'] = 'Email Template';
        $data['templates'] = $this->admin_model->select_asc('email_templates');
        $data['template'] = $this->admin_model->get_email_by_slug($slug);
        $loaded=$this->load->view('admin/include/email_template',$data,true);
        echo json_encode(array('st'=> 1, 'loaded'=> $loaded));
    }


    public function verification_template()
    {
        
        $data = array();
        $data['page_title_parent'] = 'Email Templates';
        $data['page_title'] = 'Verification Template';
        $data['template'] = $this->admin_model->get_email_by_slug('verification-template');
        $data['main_content'] = $this->load->view('admin/email_templates',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function forgot_password_template()
    {
        
        $data = array();
        $data['page_title_parent'] = 'Email Templates';
        $data['page_title'] = 'Forgot Password Template';
        $data['template'] = $this->admin_model->get_email_by_slug('forgot-password-template');
        $data['main_content'] = $this->load->view('admin/email_templates',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function book_appointment_template()
    {
        
        $data = array();
        $data['page_title_parent'] = 'Email Templates';
        $data['page_title'] = 'Book Appointment Template';
        $data['template'] = $this->admin_model->get_email_by_slug('book-appointment-template');
        $data['main_content'] = $this->load->view('admin/email_templates',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function subscription_expire_reminder_template()
    {
        
        $data = array();
        $data['page_title_parent'] = 'Email Templates';
        $data['page_title'] = 'Subscription Expire Reminder Template';
        $data['template'] = $this->admin_model->get_email_by_slug('subscription-expire-reminder-template');
        $data['main_content'] = $this->load->view('admin/email_templates',$data,TRUE);
        $this->load->view('admin/index',$data);
    }
    
    public function successfull_registration_template()
    {
        
        $data = array();
        $data['page_title_parent'] = 'Email Templates';
        $data['page_title'] = 'Successfull Registration Template';
        $data['template'] = $this->admin_model->get_email_by_slug('successfull-registration-template');
        $data['main_content'] = $this->load->view('admin/email_templates',$data,TRUE);
        $this->load->view('admin/index',$data);
    }
    
    public function doctor_appointment_confirmation_template()
    {
        
        $data = array();
        $data['page_title_parent'] = 'Email Templates';
        $data['page_title'] = 'Doctor Appointment Confirmation Template';
        $data['template'] = $this->admin_model->get_email_by_slug('doctor-appointment-confirmation-template');
        $data['main_content'] = $this->load->view('admin/email_templates',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function patient_appointment_confirmation_template()
    {
        
        $data = array();
        $data['page_title_parent'] = 'Email Templates';
        $data['page_title'] = 'Patient Appointment Confirmation Template';
        $data['template'] = $this->admin_model->get_email_by_slug('patient-appointment-confirmation-template');
        $data['main_content'] = $this->load->view('admin/email_templates',$data,TRUE);
        $this->load->view('admin/index',$data);
    }


    public function add()
    {	
        if($_POST)
        {   

            //validate inputs

            $slug = $this->input->post('slug', true);
            //echo "<pre>"; print_r($slug); exit();
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url('admin/email_templates'));
            } else {
                $data=array(
                    'subject' => $this->input->post('subject', true),
                    'body' => $this->input->post('body', true),
                    'slug' => $slug,
                );
                $data = $this->security->xss_clean($data);
                //echo "<pre>"; print_r( $data); exit();
                $template = $this->admin_model->get_email_by_slug($slug);
                $this->admin_model->edit_option($data, $template->id, 'email_templates');
                $this->session->set_flashdata('msg', trans('updated-successfully')); 

            }
        }   
        
        redirect($_SERVER['HTTP_REFERER']);   
        
    }

}
	

