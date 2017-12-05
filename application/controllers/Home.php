<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
      
       
        
        $this->load->model('admin_model');
        $this->load->model('user_model');
        $this->load->library('upload');
        $this->load->helper('inflector');
        $this->load->helper('text');
        $this->load->helper('url');
         $this->validated();
         
    }
    public function validated(){
        $id=$this->session->userdata('uid');
        $mid=$this->session->userdata('manager_id');
        
        if($id=="" and $mid==""){
            redirect('login_controller');
        }
    }

    public function index() {
       
        
        // $data['user'] = $this->admin_model->getcountuser();
        
        
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('index');
        $this->load->view('templates/footer');
    }

    

    public function insert() {


        $typeofrooom = $this->input->post('typeofrooom');
        $da = $this->doctor_model->load1();
        if (!empty($da)) {
            $r = $da['doctor_id'] + 1;
        } else {
            $r = 1;
        }
        $e = $this->input->post('city');
        $unique = substr($e, 0, 2);
        $u = strtoupper('SNDP') . strtoupper($unique) . $r;
        $data = array(
            'doctor_specialist_id' => $this->input->post('specialist'),
            'doctor_name' => $this->input->post('dame'),
            'doctor_unique_id' => $u,
            'doctor_degree' => $this->input->post('ddegree'),
            'doctor_phone_no' => $this->input->post('dmono'),
            'doctor_hospital_phone_no' => $this->input->post('dhphone'),
            'doctor_email' => $this->input->post('email'),
            'doctor_timing' => $this->input->post('timing'),
            'doctor_area' => $this->input->post('area'),
            'doctor_city' => $this->input->post('city'),
            'doctor_state' => $this->input->post('state'),
            'doctor_country' => $this->input->post('country'),
            'doctor_hospital_facality' => $this->input->post('dhfacality'),
            'cdate' => date("Y-m-d H:i:s"),
            'udate' => date("Y-m-d H:i:s"),
        );
        $this->doctor_model->insert($data);
        $da = $this->doctor_model->load1();
        $this->session->set_userdata("getinsertdata", "insert");

        for ($i = 0; $i < count($typeofrooom); $i++) {
            $data = array(
                'room_id' => $typeofrooom[$i],
                'doctor_id' => $da['doctor_id'],
                'cdate' => date("Y-m-d H:i:s"),
                'udate' => date("Y-m-d H:i:s"),
            );
            $this->room_model->insert($data);
        }


        $files = $_FILES;
        
        $cpt = count($_FILES['doctorprofilephoto']['name']);

        for ($i = 0; $i < $cpt; $i++) {

            $_FILES['doctorprofilephoto']['name'] = $files['doctorprofilephoto']['name'][$i];
            $_FILES['doctorprofilephoto']['type'] = $files['doctorprofilephoto']['type'][$i];
            $_FILES['doctorprofilephoto']['tmp_name'] = $files['doctorprofilephoto']['tmp_name'][$i];
            $_FILES['doctorprofilephoto']['error'] = $files['doctorprofilephoto']['error'][$i];
            $_FILES['doctorprofilephoto']['size'] = $files['doctorprofilephoto']['size'][$i];

            $filename = underscore(rand(10000, 99999) . '_' . $_FILES['doctorprofilephoto']['name']);

            $targetDir = "assets/upload/doctorprofilephoto/";
            $res = $this->do_upload('doctorprofilephoto', $filename, $targetDir, 'gif|jpg|png|jpeg');

            $data = array(
                'media_name' => $filename,
                'status' => 1,
                'cdate' => date("Y-m-d H:i:s"),
                'udate' => date("Y-m-d H:i:s"),
            );
            $this->media_model->insert($data);
            $getmedia = $this->media_model->getmedia();
            $data = array(
                'media_id' => $getmedia['media_id'],
                'doctor_id' => $da['doctor_id'],
                'cdate' => date("Y-m-d H:i:s"),
                'udate' => date("Y-m-d H:i:s"),
            );
            $this->media_model->insertmap($data);
        }





        redirect('index.php/home/');
    }

    function do_upload($control, $filename, $upload_path, $file_format) {

        $config['upload_path'] = $upload_path;
        $config['file_name'] = $filename;
        $config['allowed_types'] = $file_format;
        $config['remove_spaces'] = FALSE;
        $config['max_size'] = '0';
        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($control)) {
            echo $this->upload->display_errors();
            return FALSE;
        } else {
            return TRUE;
        }
    }

    

}
