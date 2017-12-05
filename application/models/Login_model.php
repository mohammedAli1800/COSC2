<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();

        $this->load->helper('date');
    }

    public function validate() {
        // grab user input
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $sql = "SELECT  * from tbladmin where username='$username' and password='$password'";
        $query = $this->db->query($sql);


        // Let's check if there are any results




        if (!empty($query->row_array())) {

            //print_r($query->row_array());exit;
            // If there is a user, then create session data
            $row = $query->row();

            $data = array(
                'uid' => $row->admin_id,
                'username' => $row->username,
                'password' => $row->password,
                'validated' => true
            );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    public function validatemanager() {
        // grab user input
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $sql = "SELECT  * from tbl_manager where manager_name='$username' and manager_password='$password'";
        $query = $this->db->query($sql);


        // Let's check if there are any results




        if (!empty($query->row_array())) {

            //print_r($query->row_array());exit;
            // If there is a user, then create session data
            $row = $query->row();

            $data = array(
                'manager_id' => $row->manager_id,
                'manager_name' => $row->manager_name,
                'manager_password' => $row->manager_password,
                'validated' => true
            );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    public function validatestaff() {
        // grab user input
        $username = $this->input->post('username');
        $password = $this->input->post('password');

         $sql = "SELECT  * from tbl_staff where staff_name='$username' and staff_password='$password'";
        $query = $this->db->query($sql);


        // Let's check if there are any results




        if (!empty($query->row_array())) {

            //print_r($query->row_array());exit;
            // If there is a user, then create session data
            $row = $query->row();

            $data = array(
                'staff_id' => $row->staff_id,
                'staff_name' => $row->staff_name,
                'staff_password' => $row->staff_password,
                'validated' => true
            );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }

    public function getpassword($email) {
        $query = $this->db->get_where('tbl_user', array('emailid' => $email));
        return $query->row_array();
    }

    function getpassword22($id, $new) {

        $this->db->where('emailid', $id);
        return $this->db->update('tbl_user', array('password' => $new));
    }

    public function getpassword1($id, $password) {


        $sql = "select * from tbl_user where  userid ='$id' and BINARY password=BINARY '$password'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function getpassword2($id, $new) {

        $this->db->where('userid', $id);
        return $this->db->update('tbl_user', array('password' => $new));
    }

}
