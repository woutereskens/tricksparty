<?php

class Competition_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // single competition
    function get($id) {
        $this->db->where('ID', $id);
        $query = $this->db->get('competition');
        return $query->row();
    }

    // all competitions
    function getAll() {
        $this->db->order_by("Date", "ASC");
        $query = $this->db->get('competition');
        return $query->result();
    }
    
    function getLocationAndDateExists($location, $date){
        $this->db->where('Location', $location);
        $this->db->where('Date', $date);
        $query = $this->db->get('competition');
        $count = $query->num_rows(); //counting result from query
        
        if($count==0){
            return false;
        } else {
            return true;
        }
    }

    // create competition
    function insert($competition) {
        $this->db->insert('competition', $competition);
        return $this->db->insert_id();
    }

    // update competition
    function update($competition) {
        $this->db->where('ID', $competition->ID);
        $this->db->update('competition', $competition);
    }

    // delete competition
    function delete($id) {
        $this->db->where('ID', $id);
        $this->db->delete('competition');
    }

}

?>
