<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_jnspengeluaran extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_jnspengeluaran');
    }

    public function tambah_jnspengeluaran($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_jnspengeluaran($where, $table)
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

    function get_sub_jnspengeluaran()
    {
        $query = $this->db->query("SELECT kdjnspengeluaran  FROM tb_jnspengeluaran");
        return $query->result();
    }

    function get_sub_kdjns_pengeluaran($kdjnspengeluaran)
    {
        $query = $this->db->query(" SELECT kode_rekening as sisa FROM  tb_jnspengeluaran  WHERE kdjnspengeluaran = $kdjnspengeluaran LIMIT 1");
        return $query;
    }
}
