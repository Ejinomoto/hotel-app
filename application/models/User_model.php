<?php
class User_model extends CI_Model {

    // Register new user
    public function register($data) {
        $this->db->insert('users', $data);
    }

    public function get_user_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users'); // 'users' is your table name
        return $query->row(); // Return the first result as an object
    }

    // Count the total number of users in the database
    public function count_all_users() {
        return $this->db->count_all('users');
    }

    // Check if a specific role exists in the users table
    public function check_role_exists($role) {
        $query = $this->db->get_where('users', ['role' => $role]);
        return $query->num_rows() > 0; // Return true if the role exists
    }
}


