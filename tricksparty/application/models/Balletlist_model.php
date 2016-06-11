<?php

class Balletlist_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // single trick in balletlist
    function get($pilotUsername, $competitionID, $scoreType, $listEnum) {
        $this->db->where('PilotUsername', $pilotUsername);
        $this->db->where('CompetitionID', $competitionID);
        $this->db->where('ScoreType', $scoreType);
        $this->db->where('ListEnum', $listEnum);
        $query = $this->db->get('balletlist');
        return $query->row();
    }

    // all balletlists
    function getAll() {
        $this->db->order_by("Trick", "ASC");
        $query = $this->db->get('trick');
        return $query->result();
    }
    
    // all balletlists by pilot, competition and listenum
    function getAllByPilotUsernameCompetitionAndListEnum($pilotUsername, $competitionID, $listEnum) {
        $this->db->where('PilotUsername', $pilotUsername);
        $this->db->where('CompetitionID', $competitionID);
        $this->db->where('ListEnum', $listEnum);
        $this->db->order_by("ScoreType", "ASC");
        $query = $this->db->get('balletlist');
        return $query->result();
    }
    
    // all balletlists by pilot, competition
    function getAllByPilotUsernameAndCompetition($pilotUsername, $competitionID) {
        $this->db->where('PilotUsername', $pilotUsername);
        $this->db->where('CompetitionID', $competitionID);
        $query = $this->db->get('balletlist');
        return $query->result();
    }
    
    // all pilots by competition
    function getAllPilotsByCompetition($competitionID){
        $this->db->distinct();
        $this->db->select('PilotUsername');
        $this->db->where('CompetitionID', $competitionID);
        $query = $this->db->get('balletlist');
        return $query->result();
    }
    
    // check if a balletlist for a competition exists
    function getBalletlistWithCompetitionExists($pilotUsername, $competitionID){
        $this->db->where('PilotUsername', $pilotUsername);
        $this->db->where('CompetitionID', $competitionID);
        $query = $this->db->get('balletlist');
        $count = $query->num_rows(); //counting result from query
        
        if($count==0){
            return false;
        } else {
            return true;
        }
    }

    // create balletlist
    function insert($balletlist) {
        $this->db->insert('balletlist', $balletlist);
    }

    // update balletlist
    function update($balletlist) {
        $this->db->where('PilotUsername', $balletlist->PilotUsername);
        $this->db->where('CompetitionID', $balletlist->CompetitionID);
        $this->db->where('ScoreType', $balletlist->ScoreType);
        $this->db->where('ListEnum', $balletlist->ListEnum);
        $this->db->update('balletlist', $balletlist);
    }

    // delete balletlist
    function delete($balletlist) {
        $this->db->where('PilotUsername', $balletlist->PilotUsername);
        $this->db->where('CompetitionID', $balletlist->CompetitionID);
        $this->db->where('ScoreType', $balletlist->ScoreType);
        $this->db->where('ListEnum', $balletlist->ListEnum);
        $this->db->delete('balletlist');
    }

}

?>
