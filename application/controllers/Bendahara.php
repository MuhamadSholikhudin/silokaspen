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

    public function data_saldo_awal()
    {
        $data['saldo'] = $this->Model_saldoawal->tampil_data()->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/data_saldo_awal', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_saldo_awal($kdsaldo)
    {
        $where = array('kdsaldo' => $kdsaldo);
        $data['saldo'] = $this->Model_saldoawal->edit_saldoawal($where, 'tb_saldoawal')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/edit_saldo_awal', $data);
        $this->load->view('templates_admin/footer');
    }

    

    public function jenis_pengeluaran()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/jenis_pengeluaran');
        $this->load->view('templates_admin/footer');
    }

    public function edit_jenis_pengeluaran($kdjnspengeluaran)
    {
        $where = array('kdjnspengeluaran' => $kdjnspengeluaran);
        $data['jnspengeluaran'] = $this->Model_jnspengeluaran->edit_jnspengeluaran($where, 'tb_jnspengeluaran')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/edit_jenis_pengeluaran', $data);
        $this->load->view('templates_admin/footer');
    }

    public function data_jenis_pengeluaran()
    {
        $data['jnspengeluaran'] = $this->Model_jnspengeluaran->tampil_data()->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/data_jenis_pengeluaran', $data);
        $this->load->view('templates_admin/footer');
    }

    public function laporan_bku()
    {
        $data['laporan'] = $this->db->query(" SELECT tb_saldoawal.tglsaldomasuk, tb_saldoawal.kdsaldo, tb_transaksi.uraian, tb_saldoawal.saldomasuk, tb_transaksi.jumlah, tb_pajak.jumlah 
        FROM tb_saldoawal JOIN tb_transaksi ON  tb_saldoawal.kdsaldo = tb_transaksi.kdsaldo 
        JOIN tb_pajak ON tb_saldoawal.kdsaldo = tb_pajak.kdsaldo")->result();

        $data['jumtot'] = $this->db->query(" SELECT SUM(saldomasuk) as tot FROM tb_saldoawal ")->result();
        $data['jumkel'] = $this->db->query(" SELECT SUM(tb_transaksi.jumlah OR tb_pajak.jumlah) as totkel 
        FROM tb_saldoawal JOIN tb_transaksi ON  tb_saldoawal.kdsaldo = tb_transaksi.kdsaldo
        JOIN tb_pajak ON tb_saldoawal.kdsaldo = tb_pajak.kdsaldo ")->result();

        
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/laporan_bku', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_saldoawal()
    {
        $kdsaldo = $this->input->post('kdsaldo');
        $tglsaldomasuk = $this->input->post('tglsaldomasuk');
        $periodebulan = $this->input->post('periodebulan');
        $periodetahun = $this->input->post('periodetahun');
        $saldomasuk = $this->input->post('saldomasuk');
        $tglsaldosisa = $this->input->post('tglsaldosisa');
        $jumlahsaldosisa = $this->input->post('jumlahsaldosisa');

        $data = array(
            'kdsaldo' => $kdsaldo,
            'tglsaldomasuk' => $tglsaldomasuk,
            'periodebulan' => $periodebulan,
            'periodetahun' => $periodetahun,
            'saldomasuk' => $saldomasuk,
            'tglsaldosisa' => $tglsaldosisa,
            'jumlahsaldosisa' => $jumlahsaldosisa
        );

        $this->Model_saldoawal->tambah_saldoawal($data, 'tb_saldoawal');
        redirect('bendahara/data_saldo_awal');
    }

    public function edit_saldoawal_aksi()
    {
        $kdsaldo = $this->input->post('kdsaldo');
        $tglsaldomasuk = $this->input->post('tglsaldomasuk');
        $periodebulan = $this->input->post('periodebulan');
        $periodetahun = $this->input->post('periodetahun');
        $saldomasuk = $this->input->post('saldomasuk');
        $tglsaldosisa = $this->input->post('tglsaldosisa');
        $jumlahsaldosisa = $this->input->post('jumlahsaldosisa');

        $data = array(
            'kdsaldo' => $kdsaldo,
            'tglsaldomasuk' => $tglsaldomasuk,
            'periodebulan' => $periodebulan,
            'periodetahun' => $periodetahun,
            'saldomasuk' => $saldomasuk,
            'tglsaldosisa' => $tglsaldosisa,
            'jumlahsaldosisa' => $jumlahsaldosisa
        );

        $where = [
            'kdsaldo' => $kdsaldo
        ];

        $this->Model_saldoawal->update_data($where, $data, 'tb_saldoawal');
        redirect('bendahara/data_saldo_awal');
    }

    public function tambah_jnspengeluaran()
    {
        $kdjnspengeluaran = $this->input->post('kdjnspengeluaran');
        $uraian = $this->input->post('uraian');
        $carapembayaran = $this->input->post('carapembayaran');
        $namatoko = $this->input->post('namatoko');
        $alamattoko = $this->input->post('alamattoko');

        $data = array(
            'kdjnspengeluaran' => $kdjnspengeluaran,
            'uraian' => $uraian,
            'carapembayaran' => $carapembayaran,
            'namatoko' => $namatoko,
            'alamattoko' => $alamattoko
        );

        $this->Model_jnspengeluaran->tambah_jnspengeluaran($data, 'tb_jnspengeluaran');
        redirect('bendahara/index');
    }

    public function edit_jnspengeluaran_aksi()
    {
        $kdjnspengeluaran = $this->input->post('kdjnspengeluaran');
        $uraian = $this->input->post('uraian');
        $carapembayaran = $this->input->post('carapembayaran');
        $namatoko = $this->input->post('namatoko');
        $alamattoko = $this->input->post('alamattoko');

        $data = array(
            'kdjnspengeluaran' => $kdjnspengeluaran,
            'uraian' => $uraian,
            'carapembayaran' => $carapembayaran,
            'namatoko' => $namatoko,
            'alamattoko' => $alamattoko
        );

        $where = [
            'kdjnspengeluaran' => $kdjnspengeluaran
        ];

        $this->Model_jnspengeluaran->update_data($where, $data, 'tb_jnspengeluaran');
        redirect('bendahara/data_jenis_pengeluaran');
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
