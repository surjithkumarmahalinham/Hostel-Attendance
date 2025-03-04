<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hostel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database(); 
    }

    public function insert_hostel($data) {
       
        return $this->db->insert('hostel', $data); 
    }

    public function insert_room($data) {
        return $this->db->insert('room', $data); 
    }

    public function insert_student($data) {
        return $this->db->insert('student', $data); 
    }

    public function insert_attendance($data) {
        return $this->db->insert('attendance', $data); 
    }
    
}
