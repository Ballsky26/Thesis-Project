<?php

class Staff_model extends CI_Model
{
    public function getAllStaff()
    {
        return $this->db->get('Staff')->result_array();
    }
    public function tambahDataStaff($data, $staff)
    {
        $this->db->insert($staff, $data);
    }
    public function hapusDataStaff($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('staff');
    }
    public function getStaffById($id)
    {
        return $this->db->get_where('staff', ['id' => $id])->row_array();
    }
}
