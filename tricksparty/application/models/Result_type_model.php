<?php

class Result_type_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // all ballet trick result types
    function get($resultType) {
        $this->db->where('ResultType', $resultType);
        $query = $this->db->get('resulttype');
        return $query->row();
    }
    
    function getAllNumbers() {
        $this->db->like('ResultType', '0');
        $this->db->or_like('ResultType', '1');
        $query = $this->db->get('resulttype');
        return $query->row();
    }
}
?>
