<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load the M_kamar model globally for all functions in this controller
        $this->load->model('M_fasilitas');
    }



    public function index()
    {
        $data['title'] = 'Data Fasilitas';
        $data['row'] = $this->M_fasilitas->getAll()->result();
        $this->load->view('backend/fasilitas-admin', $data);
    }





    public function tambah()
    {
        if (isset($_POST['submit'])) {
            $this->load->library('upload');
            $this->upload->initialize($this->set_upload());
            $data = array();

            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $fileData = $this->upload->data();
                $data['gambar'] = $fileData['file_name'];
            }

            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('description');



            $this->db->insert('fasilitas', $data);
            redirect('fasilitas');
        } else {
            $data['title'] = 'Data fasilitas';
            $data['row'] = $this->M_fasilitas-- > getAll()->result();
            $this->load->view('backend/fasilitas', $data);
        }
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {
            $this->load->library('upload');
            $this->upload->initialize($this->set_upload());
            $data = array();

            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $fileData = $this->upload->data();
                $data['gambar'] = $fileData['file_name'];
            }

            $fasilitas_id = $this->input->post('fasilitas_id');
            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('description');

            $this->db->where('fasilitas_id', $fasilitas_id);
            $this->db->update('fasilitas', $data);
            redirect('fasilitas');
        } else {

            $id = $this->uri->segment(3);
            $data['title'] = 'Data Fasilitas';

            $data['editnya'] = $this->db->get_where('fasilitas', array('fasilitas_id' => $id))->row();



            $data['row'] = $this->M_fasilitas->getAll()->result();

            $this->load->view('backend/fasilitas-edit', $data);
        }
    }


    private function set_upload()
    {
        $config = array();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['file_name'] = 'fasilitas-' . substr(md5(rand()), 0, 10);
        return $config;
    }

    public function del($id)
    {
        // Set the room as deleted by updating the is_deleted flag
        $this->db->where('fasilitas_id', $id);
        $this->db->update('fasilitas', array('is_deleted' => 1)); // Mark as deleted

        // Set flash message and redirect
        $this->session->set_flashdata('message', 'Facility deleted successfully');
        redirect('fasilitas');
    }
}
