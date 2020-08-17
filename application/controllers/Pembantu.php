<?php

class Pembantu extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('hakakses') != 'pembantu'){
$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Login
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('auth/login');
        }
    }


    public function index(){

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('pembantu/dashboard');
        $this->load->view('templates_admin/footer.php');
    }

    public function pajak()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('pembantu/pajak');
        $this->load->view('templates_admin/footer.php');
    }

    public function transaksi()
    {

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('pembantu/transaksi');
        $this->load->view('templates_admin/footer.php');
    }

    public function tambah_transaksi()
    {

        $notransaksi = $this->input->post('notransaksi');
        $kdjnspengeluaran = $this->input->post('kdjnspengeluaran');
        $kdsaldo = $this->input->post('kdsaldo');
        $jnstransaksi = $this->input->post('jnstransaksi');
        $uraian = $this->input->post('uraian');
        $jumlah = $this->input->post('jumlah');

        $data = array(
            'notransaksi' => $notransaksi,
            'kdjnspengeluaran' => $kdjnspengeluaran,
            'kdsaldo' => $kdsaldo,
            'jnstransaksi' => $jnstransaksi,
            'uraian' => $uraian,
            'jumlah' => $jumlah
        );

        $this->model_transaksi->tambah_transaksi($data, 'tb_transaksi');
        redirect('pembantu/index');
    }

    public function tambah_pajak()
    {

        $nodok = $this->input->post('nodok');
        $tgldok = $this->input->post('tgldok');
        $jumlah = $this->input->post('jumlah');
        $kdjndpengeluaran = $this->input->post('kdjndpengeluaran');
        $kdsaldo = $this->input->post('kdsaldo');
        $ppn = $this->input->post('ppn');

        $data = array(
            'nodok' => $nodok,
            'tgldok' => $tgldok,
            'jumlah' => $jumlah,
            'kdjndpengeluaran' => $kdjndpengeluaran,
            'kdsaldo' => $kdsaldo,
            'ppn' => $ppn
        );

        $this->model_pajak->tambah_pajak($data, 'tb_pajak');
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
