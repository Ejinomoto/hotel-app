<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_kamar');
    }

    public function index() {
        $data['row'] = $this->M_kamar->getAll()->result();

        // Check if the user is logged in
        $data['is_logged_in'] = $this->session->userdata('user_id') ? true : false;

        $this->load->view('home', $data);
    }
}
