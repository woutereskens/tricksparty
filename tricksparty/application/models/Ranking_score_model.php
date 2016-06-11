<?php

class Ranking_score_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // single ranking score
    function get($rankingID, $scoreType) {
        $this->db->where('RankingID', $rankingID);
        $this->db->where('ScoreType', $scoreType);
        $query = $this->db->get('rankingscore');
        return $query->row();
    }
    
    // create calculatedscore
    function insert($ranking_score) {
        $this->db->insert('rankingscore', $ranking_score);
    }

}

?>
