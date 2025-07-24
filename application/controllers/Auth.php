<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    // Load the registration view
    public function register() {
        $this->load->view('auth/register'); 
    }

    // Handle registration form submission
    public function register_action() {
        // Check how many users exist in the database
        $user_count = $this->User_model->count_all_users();
        $role = 'user'; // Default role
    
        // Assign roles based on user count
        if ($user_count == 0) {
            $role = 'admin'; // First user becomes admin
        } else {
            // Check if an admin already exists
            $admin_exists = $this->User_model->check_role_exists('admin');
            if (!$admin_exists) {
                $role = 'admin'; // Assign admin role if no admin exists
            } else {
                // Check if a receptionist already exists
                $receptionist_exists = $this->User_model->check_role_exists('receptionist');
                if (!$receptionist_exists) {
                    $role = 'receptionist'; // Assign receptionist if no receptionist exists
                }
            }
        }
    
        // Prepare user data
        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT), // Secure password hashing
            'email' => $this->input->post('email'),
            'role' => $role // Set role based on logic
        ];
    
        // Insert the new user data into the database
        $this->User_model->register($data);
        redirect('auth/login'); // Redirect to login after successful registration
    }
    

    // Load the login view
    public function login() {
        $this->load->view('auth/login'); 
    }

    // Handle login form submission
    public function login_action() {
        $username = $this->input->post('username');
        $password = $this->input->post('password'); // Plain text password from the form
    
        // Fetch the user record from the database by username
        $user = $this->User_model->get_user_by_username($username);
    
        // Check if the user exists and verify the password using password_verify
        if ($user && password_verify($password, $user->password)) {
            // Set session data if login is successful
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('username', $user->username);

            
            // Check user role and redirect accordingly
            if ($user->role == 'admin') {
                redirect('backend');
            } elseif ($user->role == 'receptionist'){
                redirect('booking');
            } else {
                // Default redirect or handle unknown roles
                redirect('welcome');
            }
        } else {
            // Set an error message and reload the login page if login fails
            $this->session->set_flashdata('error', 'Invalid username or password.');
            redirect('auth/login');
        }
    }
    
    

    // Log out the user and clear session data
    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('welcome'); // Redirect to login page after logout
    }
}
