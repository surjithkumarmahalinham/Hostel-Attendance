<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {
	
    function __construct() {
        parent::__construct();
        $this->load->model('hostel');
    }

    public function index()
    {
        $sql = "SELECT 
    (SELECT COUNT(*) FROM hostel) AS total_hostels,
    (SELECT COUNT(*) FROM student) AS total_students,
    (SELECT COUNT(*) FROM room) AS total_rooms;
";
        
        $query1 = $this->db->query($sql); 
        $data['total'] = $query1->row();

        $this->load->view('index',$data);
    }
    public function hostel()
    {
        
        $query = $this->db->get('hostel'); 
        $data['hostels'] = $query->result_array();
    
        $this->load->view('hostel', $data); 
    }
    public function hostel_save(){
        $slug = url_title($this->input->post('hostel_name'), 'dash', TRUE);
        $data = array(
            'hostel_name'  => $this->input->post('hostel_name'),
            'slug'  => $slug,
        );
        $this->hostel->insert_hostel($data);
        redirect('hostel');
    }
    public function hostelroom()
    {
        $query = $this->db->get('hostel'); 
        $data['hostel'] = $query->result_array();

        $sql = "select room.id, room.room_name, hostel.hostel_name 
                from room 
                join hostel ON room.hostel_id = hostel.id";
        
        $query1 = $this->db->query($sql); 
        $data['room'] = $query1->result_array();

        $this->load->view('hostelroom', $data);
    }
    public function hostelroom_save(){
        $data = array(
            'room_name'  => $this->input->post('room_name'),
            'hostel_id'  => $this->input->post('hostel_id'),
        );

        $this->hostel->insert_room($data);
        redirect('room');

    }

    public function student()
    {
        $query = $this->db->get('hostel'); 
        $data['hostel'] = $query->result_array();

        $query1 = $this->db->get('room'); 
        $data['room'] = $query1->result_array();

        $sql = "select s.id, s.ad_no,s.student_name, h.hostel_name, r.room_name
                from student s
                join hostel h ON s.hostel_id = h.id
                join room r ON s.room_id = r.id";
        
        $query2 = $this->db->query($sql); 
        $data['student'] = $query2->result_array();


        $this->load->view('student',$data);
    }

    public function getroom() {
        $hostel_id = $_GET['hostel_id'];
        $sql = "select room.id, room.room_name
                from room where hostel_id = $hostel_id";
        
        $query1 = $this->db->query($sql); 
        $data['room'] = $query1->result();

        echo json_encode($data['room']);
    }


    public function student_save(){
        $data = array(
            'ad_no'  => $this->input->post('ad_no'),
            'student_name'  => $this->input->post('student_name'),
            'hostel_id'  => $this->input->post('hostel_id'),
            'room_id'  => $this->input->post('room_id'),
        );

        $this->hostel->insert_student($data);
        redirect('student');
    }
    public function attendance(){
        $query = $this->db->get('room'); 
        $data['attendance'] = $query->result_array();
    
        $this->load->view('attendance', $data);
    }
    public function roomstudent($id){
        $sql = "select s.id, s.ad_no,s.student_name, h.hostel_name, r.room_name
                from student s
                join hostel h ON s.hostel_id = h.id
                join room r ON s.room_id = r.id
                where s.room_id = $id";
        
        $query = $this->db->query($sql); 
        $data['studentList'] = $query->result_array();

        $sql1 = "select room_name
        from room where id = $id";

        $query1 = $this->db->query($sql1); 
        $data['roomname'] = $query1->row();

        $this->load->view('roomstudent', $data);
    }

    public function attendance_store() {
        $student_id = $_POST['student_id'];
        $status = $_POST['status'];

            $data = [
                'student_id' => $student_id,
                'status' => $status
            ];
            $this->hostel->insert_attendance($data);
        
        echo json_encode(['status' => 'success']);
    }

    public function report()
    {
        $sql = "select s.student_name, a.status, a.created_on,r.room_name 
        from attendance a
        join student s ON a.student_id = s.id
        join room r on r.id = s.room_id";
        
        $query = $this->db->query($sql); 
        $data['attendance'] = $query->result_array();
        $this->load->view('report', $data); 
    }
}

?>