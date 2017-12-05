<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('manager_model');
        $this->load->library('upload');
        $this->load->helper('inflector');
        $this->load->helper('text');
        $this->load->helper('url');
        $this->validated();
    }
     public function finddata(){
        $name = $_POST['name'];
        $sql = "select * from tbl_manager where manager_name ='$name'";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        
        echo $res['manager_id'];
        
    }
    public function index() {
        
        $data['manager'] = $this->manager_model->getall();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('managergrid', $data);
        $this->load->view('templates/footer');
    }
    
    

    public function validated() {
        $id=$this->session->userdata('uid');
        $mid=$this->session->userdata('manager_id');
        
        if($id=="" and $mid==""){
            redirect('login_controller');
        }
    }

    public function loadData() {
        $loadType = $_POST['loadType'];
        $loadId = $_POST['loadId'];

        //$this->load->model('model');
        $result = $this->manager_model->getData($loadType, $loadId);
        $HTML = "";

        if ($result->num_rows() > 0) {
            foreach ($result->result() as $list) {
                $HTML .= "<option value='" . $list->id . "'>" . $list->name . "</option>";
            }
        }
        echo $HTML;
    }

    public function add() {
        $id = $this->uri->segment(3);
        $data['country'] = $this->manager_model->loadcountry();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('manager_add', $data);
        $this->load->view('templates/footer');
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data['manager'] = $this->manager_model->load($id);
        //print_r($data);exit;
        $data['country'] = $this->manager_model->loadcountry();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('manager_edit', $data);
        $this->load->view('templates/footer');
    }

    private function set_upload_options() {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'assets/upload/doctorprofilephoto/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['remove_spaces'] = FALSE;
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

    public function insert() {

        $name = $this->input->post('manager_name');
        $sql = "select * from tbl_manager where manager_name ='$name'";
        $query = $this->db->query($sql);
        $res = $query->row_array();

        
        if (!empty($res)) {

            $data['manager'] = $this->manager_model->load($res['manager_id']);
            //print_r($data);exit;
            $data['country'] = $this->manager_model->loadcountry();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('manager_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'manager_name' => $this->input->post('manager_name'),
                'manager_phone' => $this->input->post('manager_phone'),
                'manager_email' => $this->input->post('manager_email'),
                'manager_password' => $this->input->post('manager_password'),
                'manager_dob' => $this->input->post('manager_dob'),
                'manager_country' => $this->input->post('manager_country'),
                'manager_state' => $this->input->post('manager_state'),
                'manager_city' => $this->input->post('manager_city'),
                'manager_state' => $this->input->post('manager_state'),
            );
            //print_r($data);exit;
            $this->manager_model->insert($data);

            $this->session->set_userdata("getinsertdata", "insert");
            redirect('manager/');
        }
    }

    public function update() {



            $data = array(
                'manager_id' => $this->input->post('manager_id'),
                'manager_name' => $this->input->post('manager_name'),
                'manager_phone' => $this->input->post('manager_phone'),
                'manager_email' => $this->input->post('manager_email'),
                'manager_password' => $this->input->post('manager_password'),
                'manager_dob' => $this->input->post('manager_dob'),
                'manager_country' => $this->input->post('manager_country'),
                'manager_state' => $this->input->post('manager_state'),
                'manager_city' => $this->input->post('manager_city'),
                'manager_state' => $this->input->post('manager_state'),
            );
            //print_r($data);exit;
            $this->manager_model->update($data);

            $this->session->set_userdata("getinsertdata", "insert");

            redirect('manager/');
        //}
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $result = $this->manager_model->delete($id);
        $this->session->set_userdata("getdeletedata", "delete");
        redirect('manager/');
    }

    public function deletemedia() {
        $m_id = $this->input->get('m_id');
        $d_id = $this->input->get('d_id');
        $m_name = $this->input->get('m_name');
        $map_id = $this->input->get('map_id');

        $result = $this->doctor_model->deletemediamapbymapid($map_id);
        $result = $this->doctor_model->deletemedia($m_id);
        if (file_exists('assets/upload/doctorprofilephoto/' . $m_name)) {
            unlink('assets/upload/doctorprofilephoto/' . $m_name);
        }

        $data = $this->doctor_model->get_media_map($d_id);
        return print(json_encode($data));
    }

    public function statusupdate() {
        $id = $this->uri->segment(3);
        $status = $this->uri->segment(4);

        $data = array(
            'doctor_id' => $id,
            'status' => $status,
        );

        $result = $this->doctor_model->updatestatus($data);
        redirect('doctor/');
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
