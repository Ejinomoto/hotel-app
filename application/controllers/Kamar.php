<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kamar');
        $this->load->library('session');

        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            // Redirect to login page if not logged in
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Kamar';
        $data['row'] = $this->M_kamar->getAll()->result();
        $this->load->view('backend/list_kamar', $data);
    }

    

}
