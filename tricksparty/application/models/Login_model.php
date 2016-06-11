<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // single login
    function get($username) {
        $this->db->where('Username', $username);
        $query = $this->db->get('login');
        return $query->row();
    }

    // all logins
    function getAll() {
        $this->db->order_by('Permission', 'ASC');
        $this->db->order_by('Username', 'ASC');
        $query = $this->db->get('login');
        return $query->result();
    }
    
    // all logins that have a certain permission
    function getAllByPermission($permissionID) {
        $this->db->where('PermissionID', $permissionID);
        $query = $this->db->get('login');
        return $query->result();
    }
    
    // all logins that are pilots
    function getAllPilots() {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->join('person', 'person.Username = login.Username');
        $this->db->where('login.Permission', 'Pilot');
        $this->db->order_by('person.LastName', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    // login
    function login($username, $password) {
        $this->db->select('Username, Permission');
        $this->db->from('login');
        $this->db->where('Username', $username);
        $this->db->where('Password', md5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    // check password
    function checkPassword($username, $password) {
        $this->db->where('Username', $username);
        $this->db->where('Password', md5($password));
        $query = $this->db->get('login');
        $count = $query->num_rows(); //counting result from query
        
        if($count==0){
            return false;
        } else {
            return true;
        }
    }

    // create login
    function insert($login) {
        $this->db->insert('login', $login);
        return $this->db->insert_id();
    }

    // update login where user and permission
    function update($login) {
        $this->db->where('Username', $login->Username);
        $this->db->where('Permission', $login->Permission);
        $this->db->update('login', $login);
    }

    // delete login
    function delete($username) {
        $this->db->where('Username', $username);
        $this->db->delete('login');
    }

}

?>
