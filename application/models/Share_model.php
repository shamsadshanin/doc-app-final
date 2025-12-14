<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Share_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Get operation by share token
    public function get_operation_by_token($token)
    {
        $this->db->select('o.*, p.name as patient_name, u.name as doctor_name');
        $this->db->from('operations as o');
        $this->db->join('patientses as p', 'p.id = o.patient_id');
        $this->db->join('users as u', 'u.id = o.user_id');
        $this->db->where('o.share_token', $token);
        $query = $this->db->get();
        return $query->row();
    }

    // Get media for an operation
    public function get_media($operation_id)
    {
        $this->db->where('operation_id', $operation_id);
        $query = $this->db->get('media');
        return $query->result();
    }
}
