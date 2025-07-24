<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load the model here, so it's available in all methods
        $this->load->model('Booking_model');
    }

    public function index()
    {
        // Get the logged-in user's ID
        $user_id = $this->session->userdata('user_id');

        // Fetch the reservations for this user
        $data['reservations'] = $this->Booking_model->get_user_reservations($user_id);

        // Load the 'user' view with the reservations data
        $this->load->view('user', $data);
    }

    public function activity_timeline()
    {
        // This method is not really needed anymore since 'index()' is handling it
        $this->index();
    }
}
