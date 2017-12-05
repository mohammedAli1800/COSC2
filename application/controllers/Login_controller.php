<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_controller extends CI_Controller {

    
    public function index($msg = "") {
        $data['msg'] = $msg;

        $this->load->view('reslogin.php', $data);
    }

    public function makeout() {
        $this->load->library('session');
        $this->session->sess_destroy();
        //  redirect('era_admin/login');
        $data['msg'] = "Successfully Logged Out";
        if ($this->session->userdata('manager_id') != "") {

            redirect('login_controller/login');
        } elseif ($this->session->userdata('staff_id') != "") {

            redirect('login_controller/staff');
        } else {
            redirect('login_controller/');
        }
    }

    public function login($msg = "") {


        $data['msg'] = $msg;
        $this->load->view('manager_login', $data);
    }

    public function staff($msg = "") {


        $data['msg'] = $msg;
        $this->load->view('staff_login', $data);
    }

    public function managerprocess() {
        // Load the model

        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validatemanager();
        // echo $result;exit;
        // Now we verify the result
        if (!$result) {

            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid Username or Password.</font><br />';

            $this->login($msg);
        } else {
            // If user did validate, 
            // Send them to members area
            // redirect('era_admin/admindashborde');

            redirect('home');
        }
    }

    public function staffprocess() {
        // Load the model

        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validatestaff();
        // echo $result;exit;
        // Now we verify the result
        if (!$result) {

            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid Username or Password.</font><br />';

            $this->staff($msg);
        } else {
            // If user did validate, 
            // Send them to members area
            // redirect('era_admin/admindashborde');

            redirect('stafflogin');
        }
    }

    public function process() {
        // Load the model

        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate();
        // echo $result;exit;
        // Now we verify the result
        if (!$result) {

            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid Username or Password.</font><br />';

            $this->index($msg);
        } else {
            // If user did validate, 
            // Send them to members area
            // redirect('era_admin/admindashborde');

            redirect('home');
        }
    }

}
