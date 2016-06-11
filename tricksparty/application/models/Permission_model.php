<?php

class Permission_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // single permission
    function get($permission) {
        $this->db->where('Permission', $permission);
        $query = $this->db->get('permission');
        return $query->row();
    }

    // all permissions
    function getAll() {
        $this->db->order_by("Permission", "ASC");
        $query = $this->db->get('permission');
        return $query->result();
    }
   
    // create permission
    function insert($permission) {
        $this->db->insert('permission', $permission);
    }

    // edit permission
    function update($permission) {
        $this->db->where('Permission', $permission->Permission);
        $this->db->update('permission', $permission);
    }

    // delete permission
    function delete($permission) {
        $this->db->where('Permission', $permission->Permission);
        $this->db->delete('balletlist');
    }

}

?>
