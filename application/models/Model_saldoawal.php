<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_saldoawal extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_saldoawal');
    }

    public function tambah_saldoawal($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_saldoawal($where, $table)
    {
        return $this->db->get_where($table, $where);

    }

    public function update_data($where, $data, $table)
    {
         $this->db->where($where);
         $this->db->update($table, $data);
    }

    public function update_datat($wheret, $datat, $table)
    {
        $this->db->where($wheret);
        $this->db->update($table, $datat);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id)
    {
        $result = $this->db->where('id_brg', $id)
        ->limit(1)
        ->get('tb_saldoawal');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

    public function detail_brg($id_brg){
$result = $this->db->where('id_brg', $id_brg)->get('tb_saldoawal');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from('tb_saldoawal');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);
        

        return $this->db->get()->result();
    }


    function get_sub_kdsaldop($notransaksi)
    {
        $query = $this->db->query(" SELECT tb_saldoawal.kdsaldo as kdsaldo, tb_saldoawal.jumlahsaldosisa as sisa FROM tb_transaksi JOIN tb_saldoawal ON tb_transaksi.kdsaldo = tb_saldoawal.kdsaldo WHERE tb_transaksi.notransaksi = $notransaksi LIMIT 1");
        // $query = $this->db->get_where('tb_transaksi', array('notransaksi' => $notransaksi));
        return $query;
    }

    function get_sub_kdsaldo($kdsaldo)
    {
        $query = $this->db->query(" SELECT kdsaldo, jumlahsaldosisa as sisa FROM  tb_saldoawal  WHERE kdsaldo = $kdsaldo LIMIT 1");
        // $query = $this->db->get_where('tb_transaksi', array('notransaksi' => $notransaksi));
        return $query;
    }
}
