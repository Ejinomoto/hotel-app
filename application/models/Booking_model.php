<?php
class Booking_model extends CI_Model
{

    public function save_reservation($data)
    {
        $this->db->insert('reservations', $data);
    }

    public function getAll()
    {
        return $this->db->get('reservations');
    }

    public function update_status($reservation_id, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('reservation_id', $reservation_id);
        $this->db->update('reservations');
    }
    public function get_user_reservations($user_id)
    {
        $this->db->select('reservations.*, kamar.tipe_kamar');
        $this->db->from('reservations');
        $this->db->join('kamar', 'reservations.kamar_id = kamar.kamar_id');
        $this->db->where('reservations.user_id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_reservation_by_id($reservation_id)
    {
        $this->db->select('reservations.*, kamar.tipe_kamar, kamar.harga');
        $this->db->from('reservations');
        $this->db->join('kamar', 'kamar.kamar_id = reservations.kamar_id');
        $this->db->where('reservations.reservation_id', $reservation_id);
        return $this->db->get()->row();
    }
}
