<?php
class M_fasilitas extends CI_Model
{
    public function getAll()
    {
        // Retrieve only rooms that are not marked as deleted
        $this->db->where('is_deleted', 0);
        return $this->db->get('fasilitas');
    }

    // Add this method to get a room by its ID (excluding deleted rooms)
    public function get_by_id($fasilitas_id)
    {
        $this->db->where('fasilitas_id', $fasilitas_id);
        $this->db->where('is_deleted', 0); // Exclude deleted rooms
        return $this->db->get('fasilitas')->row();
    }

    public function delete_fasilitas($id)
    {
        // Instead of deleting the room, mark it as deleted by setting 'is_deleted' to 1
        $this->db->where('fasilitas_id', $id);
        return $this->db->update('fasilitas', array('is_deleted' => 1)); // Soft delete
    }
}
