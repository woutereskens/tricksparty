<?php

class Imposed_trick_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getByCompetitionAndScoreType($competitionID, $scoreType) {
        $this->db->where('CompetitionID', $competitionID);
        $this->db->where('ScoreType', $scoreType);
        $query = $this->db->get('imposedtrick');
        return $query->row();
    }
    
    function getByCompetitionToDelete($competitionID) {
        $this->db->where('CompetitionID', $competitionID);
        $query = $this->db->get('imposedtrick');
        return $query->result();
    }
    
    function getImposedTricksExistForCompetition($competitionID) {
        $this->db->where('CompetitionID', $competitionID);
        $query = $this->db->get('imposedtrick');
        $count = $query->num_rows(); //counting result from query

        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }
    
    function getByCompetition($competitionID) {
        $this->db->where('CompetitionID', $competitionID);
        $this->db->like('ScoreType', 'A1', 'before'); 
        $this->db->order_by("ScoreType", "ASC");
        $query = $this->db->get('imposedtrick');
        return $query->result();
    }

    // create imposed trick
    function insert($imposed_trick) {
        $this->db->insert('imposedtrick', $imposed_trick);
    }

    // delete imposed trick
    function delete($imposed_trick) {
        $this->db->where('CompetitionID', $imposed_trick->CompetitionID);
        $this->db->where('ScoreType', $imposed_trick->ScoreType);
        $this->db->delete('imposedtrick');
    }
}

?>
