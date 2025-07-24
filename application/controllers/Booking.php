<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{


    public function index()
    {
        // Join the reservations, kamar, and users tables
        $this->db->select('reservations.*, kamar.tipe_kamar, kamar.jumlah_kamar, users.username');
        $this->db->from('reservations');
        $this->db->join('kamar', 'kamar.kamar_id = reservations.kamar_id');
        $this->db->join('users', 'users.id = reservations.user_id'); // Assuming 'id' is the primary key in 'users'
        $data['reservations'] = $this->db->get()->result();


        $this->load->view('backend/reservasi', $data); // Replace 'your_view_file' with the actual view
    }


    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Booking_model'); // Load the booking model
        $this->load->model('M_kamar'); // Load the room model
    }

    public function book($kamar_id)
    {


        // Ensure the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        // Retrieve the room data
        $data['kamar'] = $this->M_kamar->get_by_id($kamar_id);
        if (!$data['kamar']) {
            show_404();
        }

        // Load the booking form view
        $this->load->view('booking/form', $data);
    }

    public function accept($reservation_id)
    {
        // Load the Booking_model to interact with the database
        $this->load->model('Booking_model');

        // Update the status to 'confirmed'
        $this->Booking_model->update_status($reservation_id, 'confirmed');

        // Redirect back to the reservation list or another appropriate page
        redirect('booking');
    }

    public function refuse($reservation_id)
    {
        // Load the Booking_model to interact with the database
        $this->load->model('Booking_model');

        // Update the status to 'cancelled'
        $this->Booking_model->update_status($reservation_id, 'cancelled');

        // Redirect back to the reservation list or another appropriate page
        redirect('booking');
    }


    public function confirm()
    {
        // Retrieve data from the form
        $kamar_id = $this->input->post('kamar_id');
        $check_in = $this->input->post('check_in');
        $check_out = $this->input->post('check_out');
        $notes = $this->input->post('notes');
        $room_view = $this->input->post('room_view');
        $room_floor = $this->input->post('room_floor');
        $user_id = $this->session->userdata('user_id');

        // Fetch current room data to check availability
        $kamar = $this->db->get_where('kamar', array('kamar_id' => $kamar_id))->row();

        if ($kamar->jumlah_kamar > 0) {
            // Save reservation data
            $reservation_data = array(
                'user_id' => $user_id,
                'kamar_id' => $kamar_id,
                'check_in_date' => $check_in,
                'check_out_date' => $check_out,
                'notes' => $notes,
                'room_view' => $room_view,
                'room_floor' => $room_floor,
                'total_price' => $this->calculate_price($kamar_id, $check_in, $check_out),
                'status' => 'pending'
            );
            $this->Booking_model->save_reservation($reservation_data);

            // Decrease the jumlah_kamar (number of rooms available)
            $new_jumlah_kamar = $kamar->jumlah_kamar - 1;

            // Update the jumlah_kamar in the database
            $this->db->where('kamar_id', $kamar_id);
            $this->db->update('kamar', array('jumlah_kamar' => $new_jumlah_kamar));

            // Redirect to a confirmation page
            redirect('booking/confirmation');
        } else {
            // No rooms available, show an error message
            $this->session->set_flashdata('error', 'No rooms available for this type.');
            redirect('booking/error');
        }
    }

    public function confirmation()
    {
        // Load the confirmation view
        $this->load->view('booking/confirmation');
    }


    public function print_receipt($reservation_id)
    {
        // Load the reservation details from the model
        $this->load->model('Booking_model');
        $data['reservation'] = $this->Booking_model->get_reservation_by_id($reservation_id);

        // Load the view for printing the receipt
        $this->load->view('print_receipt', $data);
    }

    private function calculate_price($kamar_id, $check_in, $check_out)
    {
        // Retrieve room data
        $room = $this->M_kamar->get_by_id($kamar_id);

        // Check if room data exists
        if (!$room) {
            // Handle the error if room data is not found
            log_message('error', 'Room data not found for kamar_id: ' . $kamar_id);
            show_error('Room data not found.', 404);
        }

        // Calculate the number of days between check-in and check-out
        $days = (strtotime($check_out) - strtotime($check_in)) / (60 * 60 * 24);

        // Return the total price based on the room's price and the number of days
        return $room->harga * $days;
    }
}
