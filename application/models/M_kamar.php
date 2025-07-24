<?php
class M_kamar extends CI_Model
{
    public function getAll()
    {
        // Retrieve only rooms that are not marked as deleted
        $this->db->where('is_deleted', 0);
        return $this->db->get('kamar');
    }

    // Add this method to get a room by its ID (excluding deleted rooms)
    public function get_by_id($kamar_id)
    {
        $this->db->where('kamar_id', $kamar_id);
        $this->db->where('is_deleted', 0); // Exclude deleted rooms
        return $this->db->get('kamar')->row();
    }

    public function showFacilitiesForm()
    {
        $this->load->model('M_kamar');
        $data['facilities'] = $this->M_kamar->getAllFacilities();



        $this->load->view('dashboard-admin', $data);
    }




    public function getAllFacilities()
    {
        $this->db->where('is_deleted', 0);
        return $this->db->get('fasilitas_kamar');
    }



    public function delete_kamar($id)
    {
        // Instead of deleting the room, mark it as deleted by setting 'is_deleted' to 1
        $this->db->where('kamar_id', $id);
        return $this->db->update('kamar', array('is_deleted' => 1)); // Soft delete
    }
}
