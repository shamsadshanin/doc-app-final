<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Share extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('share_model');
    }

    public function operation($token)
    {
        $data = array();
        $data['page_title'] = 'Operation Details';      
        $data['operation'] = $this->share_model->get_operation_by_token($token);
        $data['media'] = $this->share_model->get_media($data['operation']->id);
        $data['main_content'] = $this->load->view('share/operation', $data, TRUE);
        $this->load->view('share/index', $data);
    }
}
