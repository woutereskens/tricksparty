<?php

class Selected_balletlist_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getSelectedBalletlist($pilotUsername, $competitionID){
        $this->db->where('PilotUsername', $pilotUsername);
        $this->db->where('CompetitionID', $competitionID);
        $query = $this->db->get('selectedballetlist');
        return $query->row();
    }
    
    // create selected balletlist
    function insert($selected_balletlist) {
        $this->db->insert('selectedballetlist', $selected_balletlist);
    }

    function getSelectedBalletlistExists($pilotUsername, $competitionID){
        $this->db->where('PilotUsername', $pilotUsername);
        $this->db->where('CompetitionID', $competitionID);
        $query = $this->db->get('selectedballetlist');
        $count = $query->num_rows(); //counting result from query
        
        if($count==0){
            return false;
        } else {
            return true;
        }
    }
    
    // delete selected balletlist
    function delete($selected_balletlist) {
        $this->db->where('PilotUsername', $selected_balletlist->PilotUsername);
        $this->db->where('CompetitionID', $selected_balletlist->CompetitionID);
        $this->db->delete('selectedballetlist');
    }

}

?>
