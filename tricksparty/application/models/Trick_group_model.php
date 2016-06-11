<?php

class Trick_group_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // single trick score
    function get($trickGroup, $resultType) {
        $this->db->where('TrickGroup', $trickGroup);
        $this->db->where('ResultType', $resultType);
        $query = $this->db->get('trickgroup');
        return $query->row();
    }

}

?>
