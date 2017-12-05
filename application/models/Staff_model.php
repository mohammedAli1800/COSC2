<?php

class Staff_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($data) {
        $this->db->insert('tbl_staff', $data);
    }

    public function loadcountry($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('tbl_country');
            return $query->result_array();
        }

        $query = $this->db->get_where('tbl_country', array('c_id' => $id));
        return $query->row_array();
    }

    function getData($loadType, $loadId) {
        if ($loadType == "tbl_state") {
            $fieldList = 's_id as id,state_name as name';
            $table = 'tbl_state';
            $fieldName = 's_c_id';
            $orderByField = 'state_name';
        } else {
            $fieldList = 'c_id as id,city_name as name';
            $table = 'tbl_city';
            $fieldName = 'c_s_id';
            $orderByField = 'city_name';
        }

        $this->db->select($fieldList);
        $this->db->from($table);
        $this->db->where($fieldName, $loadId);
        $this->db->order_by($orderByField, 'asc');
        $query = $this->db->get();
        return $query;
    }

    function updatestatus($data) {
        $this->db->where('doctor_id', $data['doctor_id']);
        return $this->db->update('tbl_doctor', $data);
    }

    function update($data) {
        $this->db->where('staff_id', $data['staff_id']);
        $this->db->update('tbl_staff', $data);
    }

    function get_books($limit, $start, $st = NULL) {

        if ($st == "NIL")
            $st = "";
        $sql = "select * from tblleader  limit " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function loadnationality() {
        $sql = "select * from tblleader order by leader_id desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function staff() {
        $sql = "select * from tblleader order by leader_id desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function staff_limit() {
        $sql = "select * from tblleader order by leader_id desc limit 4";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_facality_map($id) {
        $sql = "select t.*,c.facality_id as f_id,c.facality_name from hospitalfacality_doctor_map as t,tbl_hospital_facality as c where t.doctor_id='$id' and t.facality_id=c.facality_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_room_map($id) {
        $sql = "select t.*,c.room_id as r_id,c.room_name from tbl_room_doctor_map as t,tbl_room as c where t.doctor_id='$id' and t.room_id=c.room_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_media_map($id) {
        $sql = "select t.*,c.media_id as m_id,c.media_name from  tbl_media_doctor_map as t,tbl_media as c where t.doctor_id='$id' and t.media_id=c.media_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function load($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('tbl_staff');
            return $query->result_array();
        }
        
        $query = $this->db->get_where('tbl_staff', array('staff_id' => $id));
        return $query->row_array();
    }

    public function load1() {
        $id = $this->session->userdata('uid');
        $sql = "SELECT t.*,c.country_name  from tbl_user as t,tbl_country as c where t.country=c.c_id and t.role!='admin' and t.role_id='$id'";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function load12() {
        $id = $this->session->userdata('uid');
        $sql = "SELECT t.*,c.country_name  from tbl_user as t,tbl_country as c where t.country=c.c_id and t.role!='admin'";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getall() {

        $sql = "SELECT * from tbl_staff as s,tbl_country as c,tbl_state as s1,tbl_city as c1,tbl_manager as m where s.staff_country=c.c_id and s.staff_state=s1.s_id and s.staff_city=c1.c_id and s.manager_id=m.manager_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getallmanager() {

        $m_id = $this->session->userdata('manager_id');
        $sql = "SELECT * from tbl_staff as s,tbl_country as c,tbl_state as s1,tbl_city as c1,tbl_manager as m where s.staff_country=c.c_id and s.staff_state=s1.s_id and s.staff_city=c1.c_id and s.manager_id=m.manager_id and s.manager_id='$m_id'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getcity() {

        $sql = " SELECT * from tbl_city  order by  city_name  asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function loadmanager() {

        $sql = " SELECT * from tbl_manager  order by  manager_id  asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function loadmanager1 () {
         $mid = $this->session->userdata('manager_id');
        $sql = " SELECT * from tbl_manager where manager_id='$mid'   order by  manager_id  asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getcourse() {

        $sql = " SELECT * from tbl_course  order by  nameofcourse  asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getmediafordelete($id) {

        $sql = " SELECT * from  tbl_media_doctor_map where doctor_id='$id'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function resultgetmidianame($id) {

        $sql = " SELECT * from  tbl_media where media_id='$id'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function getdoctorgrid() {

        $sql = "SELECT t.*,c.specialist_name FROM tbl_doctor as t LEFT JOIN tbl_specialist as c ON t.doctor_specialist_id = c.specialist_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function load_by_status($status) {
        $query = $this->db->get_where('tblslider', array('status' => $status));
        return $query->result_array();
    }

    public function showslider() {

        $this->db->select('*');
        $this->db->order_by('slider_id');
        $this->db->limit(7);
        $this->db->from('tblslider');
        $this->db->where('status', 'Active');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }

    public function delete($id) {
        $this->db->where('staff_id', $id);
        return $this->db->delete('tbl_staff');
    }

    public function deletemedia($id) {
        $this->db->where('media_id', $id);
        return $this->db->delete('tbl_media');
    }

    public function deletemediamap($id) {
        $this->db->where('doctor_id', $id);
        return $this->db->delete('tbl_media_doctor_map');
    }

    public function deletemediamapbymapid($id) {
        $this->db->where('media_doctor_map_id', $id);
        return $this->db->delete('tbl_media_doctor_map');
    }

}

?>