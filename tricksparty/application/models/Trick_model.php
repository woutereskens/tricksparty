<?php

class Trick_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // single trick
    function get($trick) {
        $this->db->where('Trick', $trick);
        $query = $this->db->get('trick');
        return $query->row();
    }

    // all tricks
    function getAll() {
        $this->db->order_by("TrickGroup", "ASC");
        $this->db->order_by("Trick", "ASC");
        $query = $this->db->get('trick');
        return $query->result();
    }

    function getAllTrickGroups() {
        $this->db->distinct();
        $this->db->select('TrickGroup');
        $this->db->order_by("TrickGroup", "ASC");
        $query = $this->db->get('trick');
        return $query->result();
    }

    // all tricks by trickgroup
    function getAllByTrickGroup($trickGroup) {
        $this->db->where('TrickGroup', $trickGroup);
        $this->db->order_by("Trick", "ASC");
        $query = $this->db->get('trick');
        return $query->result();
    }

    // create team
    function insert($trick) {
        $this->db->insert('trick', $trick);
        return $this->db->insert_id();
    }

    // update team
    function update($trick) {
        $this->db->where('Trick', $trick->Trick);
        $this->db->update('trick', $trick);
    }

    // delete team
    function delete($trick) {
        $this->db->where('Trick', $trick);
        $this->db->delete('trick');
    }

}

?>
