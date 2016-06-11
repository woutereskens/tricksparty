<?php

class Score_type_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // single score type
    function get($scoreType) {
        $this->db->where('ScoreType', $scoreType);
        $query = $this->db->get('scoretype');
        return $query->row();
    }

    // all ballet trick types
    function getAllBalletTrickTypes() {
        $this->db->like('ScoreType', 'BT', 'after');    // Produces: WHERE `title` LIKE '%match' ESCAPE '!'
        $this->db->order_by("ScoreType", "ASC");
        $query = $this->db->get('scoretype');
        return $query->result();
    }
    
    // all imposed trick types
    function getAllImposedTrickTypesWithoutAttempts() {
        $this->db->like('ScoreType', 'IT1A1');
        $this->db->or_like('ScoreType', 'IT2A1');
        $this->db->or_like('ScoreType', 'IT3A1');
        $this->db->or_like('ScoreType', 'IT4A1');
        $this->db->order_by("ScoreType", "ASC");
        $query = $this->db->get('scoretype');
        return $query->result();
    }
    
    // all ballet trick types
    function getAllImposedTrickTypes() {
        $this->db->like('ScoreType', 'IT', 'after');    // Produces: WHERE `title` LIKE '%match' ESCAPE '!'
        $this->db->order_by("ScoreType", "ASC");
        $query = $this->db->get('scoretype');
        return $query->result();
    }

    // all extra ballet types
    function getAllExtraBalletTypes() {
        $this->db->like('ScoreType', 'Artistic');
        $this->db->or_like('ScoreType', 'Technical');
        $this->db->order_by("ScoreType", "ASC");
        $query = $this->db->get('scoretype');
        return $query->result();
    }

}

?>
