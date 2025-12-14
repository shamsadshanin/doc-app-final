<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Operation_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Get all operations for a user
    public function get_operations()
    {
        $this->db->select('o.*, p.name as patient_name, u.name as doctor_name');
        $this->db->from('operations as o');
        $this->db->join('patientses as p', 'p.id = o.patient_id');
        $this->db->join('users as u', 'u.id = o.user_id');
        $this->db->where('o.user_id', user()->id);
        $this->db->order_by('o.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Get operation by id
    public function get_operation($id)
    {
        $this->db->select('o.*, p.name as patient_name, u.name as doctor_name');
        $this->db->from('operations as o');
        $this->db->join('patientses as p', 'p.id = o.patient_id');
        $this->db->join('users as u', 'u.id = o.user_id');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    // Insert operation
    public function insert($data)
    {
        $this->db->insert('operations', $data);
        return $this->db->insert_id();
    }

    // Edit operation
    public function edit($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('operations', $data);
        return true;
    }

    // Delete operation
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('operations');
        return true;  
    }

    // Get media for an operation
    public function get_media($operation_id)
    {
        $this->db->where('operation_id', $operation_id);
        $query = $this->db->get('media');
        return $query->result();
    }

    // Get media by id
    public function get_media_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('media');
        return $query->row();
    }

    // Insert media
    public function insert_media($data)
    {
        $this->db->insert('media', $data);
        return $this->db->insert_id();
    }

    // Delete media
    public function delete_media($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('media');
        return true;
    }

    // Update operation
    public function update_operation($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('operations', $data);
        return true;
    }
}
