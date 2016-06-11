<?php

class Person_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // single person
    function get($username) {
        $this->db->where('Username', $username);
        $query = $this->db->get('person');
        return $query->row();
    }

    // all persons
    function getAll() {
        $this->db->order_by("LastName", "ASC");
        $this->db->order_by("FirstName", "ASC");
        $query = $this->db->get('person');
        return $query->result();
    }
    
    // check if a person with a login exists
    function getPersonWithLoginExists($username){
        $this->db->where('Username', $username);
        $query = $this->db->get('person');
        $count = $query->num_rows(); //counting result from query
        
        if($count==0){
            return false;
        } else {
            return true;
        }
    }
    
    // get person from login
    function getPersonFromLogin($username){
        $this->db->where('Username', $username);
        $query = $this->db->get('person');        
        return $query->row();
    }

    // create person
    function insert($person) {
        $this->db->insert('person', $person);
    }

    // update person
    function update($person) {
        $this->db->where('Username', $person->Username);
        $this->db->update('person', $person);
    }

    // delete team
    function delete($balletlist) {
        $this->db->where('PilotUsername', $balletlist->PilotUsername);
        $this->db->where('CompetitionID', $balletlist->CompetitionID);
        $this->db->where('ScoreType', $balletlist->ScoreType);
        $this->db->where('ListEnum', $balletlist->ListEnum);
        $this->db->delete('balletlist');
    }

}

?>
