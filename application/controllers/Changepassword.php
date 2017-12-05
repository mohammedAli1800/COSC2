<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Changepassword extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('upload');
        $this->load->helper('inflector');
        $this->load->helper('text');
        $this->load->helper('url');
        $this->validated();
    }

    public function validated() {
        $id = $this->session->userdata('uid');
        $mid = $this->session->userdata('manager_id');

        if ($id == "" and $mid == "") {
            redirect('login_controller');
        }
    }

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('changepassword');
        $this->load->view('templates/footer');
    }

    public function add() {

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin_add');
        $this->load->view('templates/footer');
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data['course'] = $this->course_model->load($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('course_edit', $data);
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

        $id = $this->session->userdata('admin_id');
        $mid = $this->session->userdata('manager_id');
        if ($mid == "") {
            $data = array(
                'admin_id' => $this->session->userdata('uid'),
                'password' => $this->input->post('password'),
            );

            $this->admin_model->updatechangepassword($data);


            redirect('home/');
        } else {

            $data = array(
                'manager_id' => $mid,
                'manager_password' => $this->input->post('password'),
            );

            $this->admin_model->updatechangepasswordmanager($data);


            redirect('home/');
        }
    }

    public function update() {


        $data = array(
            'admin_id' => $this->session->userdata('uid'),
            'password' => $this->input->post('password'),
        );
        //print_r($data);exit;
        $this->course_model->update($data);


        redirect('course/');
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $result = $this->admin_model->delete($id);
        // $this->session->set_userdata("getdeletedata", "delete");
        redirect('admin/');
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
