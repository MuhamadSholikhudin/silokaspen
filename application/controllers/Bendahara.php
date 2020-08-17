<?php

class Bendahara extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('hakakses') != 'bendahara'){
$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Login
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('auth/login');
        }
    }


    public function index()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/dashboard');
        $this->load->view('templates_admin/footer');
    }

    public function saldo_awal()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/saldo_awal');
        $this->load->view('templates_admin/footer');
    }

    public function jenis_pengeluaran()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/jenis_pengeluaran');
        $this->load->view('templates_admin/footer');
    }

    public function tambah_saldoawal()
    {
        $nama_brg = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $data = array(
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok
        );

        $this->model_saldoawal->tambah_saldoawal($data, 'tb_saldoawal');
        redirect('pembantu/index');
    }

    public function tambah_jnspengeluaran()
    {
        $kdjndpengeluaran = $this->input->post('kdjndpengeluaran');
        $uraian = $this->input->post('uraian');
        $carapembayaran = $this->input->post('carapembayaran');
        $namatoko = $this->input->post('namatoko');
        $alamattoko = $this->input->post('alamattoko');

        $data = array(
            'kdjndpengeluaran' => $kdjndpengeluaran,
            'uraian' => $uraian,
            'carapembayaran' => $carapembayaran,
            'namatoko' => $namatoko,
            'alamattoko' => $alamattoko
        );

        $this->model_jnspengeluaran->tambah_jnspengeluaran($data, 'tb_jnspengeluaran');
        redirect('pembantu/index');
    }

    public function edit($id)
    {
        $where = array('id_brg' => $id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer.php');
    }

    public function update()
    {
        $id = $this->input->post('id_brg');
        $nama_brg = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $data = [
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
        ];
        $where = [
            'id_brg' => $id
        ];

        $this->model_barang->update_data($where, $data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

}
