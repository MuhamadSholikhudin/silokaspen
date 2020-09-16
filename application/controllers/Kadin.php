<?php

class Kadin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('hakakses') != 'kadin'){
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
        $this->load->view('kadin/dashboard');
        $this->load->view('templates_admin/footer');
    }

    public function bku()
    {
        $data['bku'] = $this->db->query("SELECT * FROM tb_saldoawal WHERE status = 1 OR status = 2 ORDER BY tglsaldomasuk DESC")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('kadin/data_laporan_bku', $data);
        $this->load->view('templates_admin/footer');
    }

    public function laporan_bku($kdsaldo)
    {
        $data['jumif'] = $this->db->get_where('tb_saldoawal', ['kdsaldo' => $kdsaldo])->result();


        $data['laporan'] = $this->db->query(" SELECT tb_transaksi.kode_rekening, tb_transaksi.uraian, tb_transaksi.tgltransaksi, tb_transaksi.notransaksi, tb_transaksi.jumlah, tb_jnspengeluaran.carapembayaran, tb_jnspengeluaran.namatoko, tb_jnspengeluaran.alamattoko, tb_pajak.ppn, tb_pajak.pph21, tb_pajak.pph22, tb_pajak.pph23, tb_pajak.pphlain
        FROM tb_transaksi JOIN tb_saldoawal ON  tb_saldoawal.kdsaldo = tb_transaksi.kdsaldo 
        JOIN tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran
        JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi
        WHERE tb_saldoawal.kdsaldo = $kdsaldo ")->result();


        $data['idsaldo'] = $this->db->query(" SELECT * FROM tb_saldoawal WHERE kdsaldo = $kdsaldo LIMIT 1")->result();
        $data['jumsisa'] = $this->db->query(" SELECT SUM(jumlahsaldosisa) as jumsis FROM tb_saldoawal WHERE kdsaldo = $kdsaldo")->result();
        $data['jumtunai'] = $this->db->query(" SELECT SUM(tb_transaksi.jumlah) as tunai FROM tb_transaksi  JOIN tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi WHERE tb_transaksi.kdsaldo = $kdsaldo AND tb_jnspengeluaran.carapembayaran = 'tunai' ")->result();
        $data['jumnontunai'] = $this->db->query(" SELECT SUM(tb_transaksi.jumlah) as nontunai FROM tb_transaksi JOIN  tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi WHERE tb_transaksi.kdsaldo = $kdsaldo AND tb_jnspengeluaran.carapembayaran = 'nontunai' ")->result();
   
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('kadin/laporan_bku', $data);
        $this->load->view('templates_admin/footer');
    }

    public function acc_laporan()
    {
        $notransaksi = $this->input->post('notransaksi');
        $id = $this->input->post('kdsaldo');
        $result = array();
        foreach ($notransaksi as $key => $val) {
            $result[] = array(
                "notransaksi" => $notransaksi[$key],
                "status" => $_POST['status'][$key]
            );
        }
        $this->db->update_batch('tb_transaksi', $result, 'notransaksi');


        $data = [
            'status' => 2

        ];
        $where = [
            'kdsaldo' => $id
        ];

        $this->Model_saldoawal->update_data($where, $data, 'tb_saldoawal');

        $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Laporan BKU berhasil di ACC', 'success')</script>");
        redirect('kadin/laporan_bku/' . $id);
    }


    public function un_acc()
    {
        $notransaksi = $this->input->post('notransaksi');
        $id = $this->input->post('kdsaldo');
        $result = array();
        foreach ($notransaksi as $key => $val) {
            $result[] = array(
                "notransaksi" => $notransaksi[$key],
                "status" => $_POST['status'][$key]
            );
        }
        $this->db->update_batch('tb_transaksi', $result, 'notransaksi');


        $data = [
            'status' => 1

        ];
        $where = [
            'kdsaldo' => $id
        ];

        $this->Model_saldoawal->update_data($where, $data, 'tb_saldoawal');

        $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Laporan BKU berhasil di Batalkan Accnya', 'success')</script>");

        redirect('kadin/laporan_bku/' . $id);
    }


}
