<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_user');
    }

    public function tambah_tb_user($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_tb_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
         $this->db->where($where);
         $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}