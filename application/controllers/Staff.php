<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('staff_model');
        $this->load->library('upload');
        $this->load->helper('inflector');
        $this->load->helper('text');
        $this->load->helper('url');
        $this->validated();
    }

    public function index() {
        $mid = $this->session->userdata('manager_id');

        if ($mid != "") {

            $data['staff'] = $this->staff_model->getallmanager();
            //print_r($data['staff']);exit;
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('staffgrid', $data);
            $this->load->view('templates/footer');
        } else {
            $data['staff'] = $this->staff_model->getall();
            //print_r($data['staff']);exit;
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('staffgrid', $data);
            $this->load->view('templates/footer');
        }
    }
     public function finddata(){
        $name = $_POST['name'];
        $sql = "select * from tbl_staff where staff_name ='$name'";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        
        echo $res['staff_id'];
        
    }

    public function validated() {
        $id = $this->session->userdata('uid');
        $mid = $this->session->userdata('manager_id');

        if ($id == "" and $mid == "") {
            redirect('login_controller');
        }
    }

    public function loadData() {
        $loadType = $_POST['loadType'];
        $loadId = $_POST['loadId'];

        //$this->load->model('model');
        $result = $this->staff_model->getData($loadType, $loadId);
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
        $data['country'] = $this->staff_model->loadcountry();
        $mid = $this->session->userdata('manager_id');
        if ($mid != "") {
            $data['manager'] = $this->staff_model->loadmanager1();
        } else {
            $data['manager'] = $this->staff_model->loadmanager();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('staff_add', $data);
        $this->load->view('templates/footer');
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data['staff'] = $this->staff_model->load($id);
        $data['manager'] = $this->staff_model->loadmanager();
        //print_r($data);exit;
        $data['country'] = $this->staff_model->loadcountry();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('staff_edit', $data);
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

        $name = $this->input->post('staff_name');
        $sql = "select * from tbl_staff where staff_name ='$name'";
        $query = $this->db->query($sql);
        $res = $query->row_array();


        if (!empty($res)) {

            $data['staff'] = $this->staff_model->load($res['staff_id']);
            $data['manager'] = $this->staff_model->loadmanager();
            $data['country'] = $this->staff_model->loadcountry();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('staff_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $dateOfBirth = $this->input->post('staff_dob');
            $today = date("Y/m/d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            $b_date = $diff->format('%y');
            $data = array(
                'staff_name' => $this->input->post('staff_name'),
                'manager_id' => $this->input->post('manager_id'),
                'staff_phone' => $this->input->post('staff_phone'),
                'staff_email' => $this->input->post('staff_email'),
                'staff_password' => $this->input->post('staff_password'),
                'staff_dob' => $this->input->post('staff_dob'),
                'staff_country' => $this->input->post('staff_country'),
                'staff_state' => $this->input->post('staff_state'),
                'staff_city' => $this->input->post('staff_city'),
                'staff_state' => $this->input->post('staff_state'),
                'staff_age' => $b_date,
            );
            //print_r($data);exit;
            $this->staff_model->insert($data);

            $this->session->set_userdata("getinsertdata", "insert");
            redirect('staff/');
        }
    }

    public function update() {

$dateOfBirth = $this->input->post('staff_dob');
            $today = date("Y/m/d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            $b_date = $diff->format('%y');
        $data = array(
            'staff_id' => $this->input->post('staff_id'),
            'manager_id' => $this->input->post('manager_id'),
            'staff_name' => $this->input->post('staff_name'),
            'staff_phone' => $this->input->post('staff_phone'),
            'staff_email' => $this->input->post('staff_email'),
            'staff_password' => $this->input->post('staff_password'),
            'staff_dob' => $this->input->post('staff_dob'),
            'staff_country' => $this->input->post('staff_country'),
            'staff_state' => $this->input->post('staff_state'),
            'staff_city' => $this->input->post('staff_city'),
            'staff_state' => $this->input->post('staff_state'),
			 'staff_age' => $b_date,
        );
        //print_r($data);exit;
        $this->staff_model->update($data);

        $this->session->set_userdata("getinsertdata", "insert");

        redirect('staff/');
        //}
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $result = $this->staff_model->delete($id);
        $this->session->set_userdata("getdeletedata", "delete");
        redirect('staff/');
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
