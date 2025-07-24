<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load the M_kamar model globally for all functions in this controller
        $this->load->model('M_kamar');
    }



    public function index()
    {
        $data['title'] = 'Data Kamar';

        // Fetch all facilities from the `fasilitas_kamar` table
        $this->db->select('name'); // Adjust the column name (e.g., 'name') to match your table structure
        $data['facilities'] = $this->db->get('fasilitas_kamar')->result_array();

        $data['row'] = $this->M_kamar->getAll()->result();
        $this->load->view('backend/dashboard-admin', $data);
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

            $data['tipe_kamar'] = $this->input->post('tipe_kamar');
            $data['jumlah_kamar'] = $this->input->post('jumlah_kamar');
            $data['jumlah_order'] = $this->input->post('jumlah_kamar');
            $data['harga'] = $this->input->post('harga');

            $facilities = $this->input->post('fasilitas_kamar');
            $data['fasilitas_kamar'] = json_encode($facilities);

            $this->db->insert('kamar', $data);
            redirect('backend');
        } else {
            $data['title'] = 'Data Kamar';
            $data['row'] = $this->M_kamar->getAll()->result();
            $this->load->view('backend/list_kamar', $data);
        }
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {
            $this->load->library('upload');
            $this->upload->initialize($this->set_upload());
            $data = array();

            // Upload new image if provided
            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $fileData = $this->upload->data();
                $data['gambar'] = $fileData['file_name'];
            }

            // Update room information
            $kamar_id = $this->input->post('kamar_id');
            $data['tipe_kamar'] = $this->input->post('tipe_kamar');
            $data['jumlah_kamar'] = $this->input->post('jumlah_kamar');
            $data['jumlah_order'] = $this->input->post('jumlah_kamar');
            $data['harga'] = $this->input->post('harga');

            // Handle fasilitas_kamar (convert to JSON before saving)
            $fasilitas_kamar = $this->input->post('fasilitas_kamar');
            if (!empty($fasilitas_kamar)) {
                $data['fasilitas_kamar'] = json_encode($fasilitas_kamar);
            }

            // Update the room in the database
            $this->db->where('kamar_id', $kamar_id);
            $this->db->update('kamar', $data);
            redirect('backend');
        } else {
            // Get room ID from URL segment
            $id = $this->uri->segment(3);
            $data['title'] = 'Data Kamar';

            // Fetch room data to edit
            $data['editnya'] = $this->db->get_where('kamar', array('kamar_id' => $id))->row();

            // Decode the fasilitas_kamar for the current room
            $data['editnya']->fasilitas_kamar = json_decode($data['editnya']->fasilitas_kamar, true);

            // Fetch all facilities from fasilitas_kamar table
            $this->db->select('name');
            $data['available_facilities'] = $this->db->get('fasilitas_kamar')->result_array();

            $data['row'] = $this->M_kamar->getAll()->result();
            // Load the edit view and pass the data
            $this->load->view('backend/edit_kamar', $data);
        }
    }



    private function set_upload()
    {
        $config = array();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['file_name'] = 'kamar-' . substr(md5(rand()), 0, 10);
        return $config;
    }

    public function del($id)
    {
        // Set the room as deleted by updating the is_deleted flag
        $this->db->where('kamar_id', $id);
        $this->db->update('kamar', array('is_deleted' => 1)); // Mark as deleted

        // Set flash message and redirect
        $this->session->set_flashdata('message', 'Room deleted successfully');
        redirect('backend');
    }
}
