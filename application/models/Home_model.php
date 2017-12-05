<?php

class Home_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($data) {
        $this->db->insert('tblleader', $data);
    }

    function update($data) {
        $this->db->where('leader_id', $data['leader_id']);
        $this->db->update('tblleader', $data);
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

    public function load($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('tblleader');
            return $query->result_array();
        }

        $query = $this->db->get_where('tblleader', array('leader_id' => $id));
        return $query->row_array();
    }

    public function load1() {

        $sql = " SELECT aw_desc,aw_image FROM `tbl_award` order by aw_id desc";
        $query = $this->db->query($sql);
        return $query->row_array();
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
        $this->db->where('leader_id', $id);
        return $this->db->delete('tblleader');
    }

}

?>