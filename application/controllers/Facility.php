<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facility extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_fasilitas');
    }

    public function index()
    {
        $data['row'] = $this->M_fasilitas->getAll()->result();

        // Check if the user is logged in
        $data['is_logged_in'] = $this->session->userdata('user_id') ? true : false;

        $this->load->view('fasilitas', $data);
    }
}
