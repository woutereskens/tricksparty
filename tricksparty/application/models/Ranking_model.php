<?php

class Ranking_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // single ranking
    function get($id) {
        $this->db->where('ID', $id);
        $query = $this->db->get('ranking');
        return $query->row();
    }

    // all rankings
    function getAll() {
        $this->db->order_by("Date", "ASC");
        $query = $this->db->get('ranking');
        return $query->result();
    }
    
    // all rankings
    function getAllDistinct() {
        $this->db->select('Location, Date, NumberOfJudges');
        $this->db->distinct();
        
        $this->db->order_by("Date", "DESC");
        $query = $this->db->get('ranking');
        return $query->result();
    }
    
    // all rankings
    function getAllByLocationAndDate($location, $date) {
        $this->db->where('Location', $location);
        $this->db->where('Date', $date);
        $query = $this->db->get('ranking');
        return $query->result();
    }
    
    // all rankings by location and date
    function getDistinctByLocationAndDate($location, $date) {
        $this->db->where('Location', $location);
        $this->db->where('Date', $date);
        $this->db->limit(1);
        $query = $this->db->get('ranking');
        return $query->row();
    }
    
    function getAllByPilot($pilotFirstName, $pilotLastName){
        $this->db->where('PilotFirstName', $pilotFirstName);
        $this->db->where('PilotLastName', $pilotLastName);
        $this->db->order_by("Date", "DESC");
        $this->db->limit(10);
        $query = $this->db->get('ranking');
        return $query->result();
    }
    
    function getLocationAndDateExists($location, $date){
        $this->db->where('Location', $location);
        $this->db->where('Date', $date);
        $query = $this->db->get('ranking');
        $count = $query->num_rows(); //counting result from query
        
        if($count==0){
            return false;
        } else {
            return true;
        }
    }

    // create ranking
    function insert($ranking) {
        $this->db->insert('ranking', $ranking);
        return $this->db->insert_id();
    }

    // update ranking
    function update($ranking) {
        $this->db->where('ID', $ranking->ID);
        $this->db->update('ranking', $ranking);
    }

    // delete ranking
    function delete($id) {
        $this->db->where('ID', $id);
        $this->db->delete('ranking');
    }

}

?>
