<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('upload');
        $this->load->helper('inflector');
        $this->load->helper('text');
        $this->load->helper('url');
        $this->validated();
    }

    public function index() {
        $item_role = $this->session->userdata('manager_id');
        $data['city'] = $this->user_model->getcity();


        $where="";
        if ($this->input->post('manager_country')!="" or $this->input->post('age_id')!=""  ) {
            if($this->input->post('manager_country')!=""){
                $c=$this->input->post('manager_country');
                 $this->session->set_userdata("cc_id",$c);
                $where .= "And staff_city='$c'";
            }
            if($this->input->post('age_id')!=""){
                $c1=$this->input->post('age_id');
                $where .= " And staff_age='$c1'";
                 $this->session->set_userdata("age_id",$c1);
            }
            $manager_country = $this->input->post('manager_country');
            if ($item_role != '') {
                $data['cc_id']=$manager_country;
               
               
                $data['user'] = $this->user_model->reportmanager1($item_role,$where);
            } else {
               
                $data['user'] = $this->user_model->reportadmin1($where);
            }
        } else {
            if ($item_role != '') {
                $data['user'] = $this->user_model->reportmanager();
            } else {

                $data['user'] = $this->user_model->reportadmin();
            }
        }
      
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('reportgrid', $data);
        $this->load->view('templates/footer');
    }
    public function clearfilter() {
        $item_role = $this->session->userdata('manager_id');
        $data['city'] = $this->user_model->getcity();
        $this->session->set_userdata("cc_id","");
         $this->session->set_userdata("age_id","");
        if ($item_role != '') {
                $data['user'] = $this->user_model->reportmanager();
            } else {

                $data['user'] = $this->user_model->reportadmin();
            }
        
      
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('reportgrid', $data);
        $this->load->view('templates/footer');
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
        $result = $this->user_model->getData($loadType, $loadId);
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
        $data['country'] = $this->user_model->loadcountry();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user_add', $data);
        $this->load->view('templates/footer');
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data['user'] = $this->user_model->load($id);
        //print_r($data);exit;
        $data['country'] = $this->user_model->loadcountry();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user_edit', $data);
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


        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'phno' => $this->input->post('phno'),
            'city' => $this->input->post('city'),
            'role' => $this->input->post('role'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'role_id' => $this->session->userdata('uid'),
        );
        //print_r($data);exit;
        $this->user_model->insert($data);
        $this->session->set_userdata("getinsertdata", "insert");

        redirect('user/');
    }

    public function update() {

        $data = array(
            'uid' => $this->input->post('uid'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'phno' => $this->input->post('phno'),
            'city' => $this->input->post('city'),
            'role' => $this->input->post('role'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
        );
        //print_r($data);exit;

        $this->user_model->update($data);


        redirect('user/');
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $result = $this->user_model->delete($id);
        $this->session->set_userdata("getdeletedata", "delete");
        redirect('user/');
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
