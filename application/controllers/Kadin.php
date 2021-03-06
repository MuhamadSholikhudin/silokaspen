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

    public function laporan_bku($id_saldo)
    {
        $data['jumif'] = $this->db->get_where('tb_saldoawal', ['id_saldo' => $id_saldo])->result();


        // $data['laporan'] = $this->db->query(" SELECT tb_transaksi.kode_rekening, tb_jnspengeluaran.uraian, tb_transaksi.tgltransaksi, tb_transaksi.notransaksi, tb_transaksi.jumlah, tb_transaksi.carapembayaran, tb_transaksi.namatoko, tb_transaksi.alamattoko, tb_pajak.ppn, tb_pajak.pph21, tb_pajak.pph22, tb_pajak.pph23, tb_pajak.pphlain
        // FROM tb_transaksi JOIN tb_saldoawal ON  tb_saldoawal.id_saldo = tb_transaksi.id_saldo 
        // JOIN tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran
        // JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi
        // WHERE tb_saldoawal.id_saldo = $id_saldo ")->result();

        $data['laporan'] = $this->db->query(" SELECT tb_transaksi.kode_rekening, tb_jnspengeluaran.uraian, tb_transaksi.tgltransaksi, tb_transaksi.notransaksi, tb_transaksi.jumlah, tb_transaksi.carapembayaran, tb_transaksi.namatoko, tb_transaksi.alamattoko
         FROM tb_transaksi JOIN tb_saldoawal ON  tb_saldoawal.id_saldo = tb_transaksi.id_saldo 
         JOIN tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran
         WHERE tb_saldoawal.id_saldo = $id_saldo ")->result();

        $data['idsaldo'] = $this->db->query(" SELECT * FROM tb_saldoawal WHERE id_saldo = $id_saldo LIMIT 1")->result();
        $data['jumsisa'] = $this->db->query(" SELECT SUM(jumlahsaldosisa) as jumsis FROM tb_saldoawal WHERE id_saldo = $id_saldo")->result();
        $data['jumtunai'] = $this->db->query(" SELECT SUM(tb_transaksi.jumlah) as tunai FROM tb_transaksi  JOIN tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran  WHERE tb_transaksi.id_saldo = $id_saldo AND tb_transaksi.carapembayaran = 'Tunai' ")->result();
        $data['jumnontunai'] = $this->db->query(" SELECT SUM(tb_transaksi.jumlah) as nontunai FROM tb_transaksi JOIN  tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran  WHERE tb_transaksi.id_saldo = $id_saldo AND tb_transaksi.carapembayaran = 'Non-Tunai' ")->result();

        $data['jumppn'] = $this->db->query(" SELECT SUM(ppn) as ppn FROM tb_pajak  WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpph21'] = $this->db->query(" SELECT SUM(pph21) as pph21 FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpph22'] = $this->db->query(" SELECT SUM(pph22) as pph22 FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpph23'] = $this->db->query(" SELECT SUM(pph23) as pph23 FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpphlain'] = $this->db->query(" SELECT SUM(pphlain) as pphlain FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();


        $data['bendahara'] = $this->db->query(" SELECT * FROM tb_user WHERE hakakses = 'bendahara' LIMIT 1")->result();
        $data['kadin'] = $this->db->query("SELECT * FROM tb_user WHERE hakakses = 'kadin' LIMIT 1")->result();        
     

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('kadin/laporan_bku', $data);
        $this->load->view('templates_admin/footer');
    }

    public function acc_laporan()
    {
        $notransaksi = $this->input->post('notransaksi');
        $id = $this->input->post('id_saldo');
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
            'id_saldo' => $id
        ];

        $this->Model_saldoawal->update_data($where, $data, 'tb_saldoawal');

        $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Laporan BKU berhasil di ACC', 'success')</script>");
        redirect('kadin/laporan_bku/' . $id);
    }


    public function un_acc()
    {
        $notransaksi = $this->input->post('notransaksi');
        $id = $this->input->post('id_saldo');
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
            'id_saldo' => $id
        ];

        $this->Model_saldoawal->update_data($where, $data, 'tb_saldoawal');

        $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Laporan BKU berhasil di Batalkan Accnya', 'success')</script>");

        redirect('kadin/laporan_bku/' . $id);
    }


    public function cetak_bku($id_saldo)
    {

        // $data['laporan'] = $this->db->query(" SELECT tb_transaksi.kode_rekening, tb_transaksi.uraian, tb_transaksi.tgltransaksi, tb_transaksi.notransaksi, tb_transaksi.jumlah, tb_jnspengeluaran.carapembayaran, tb_jnspengeluaran.namatoko, tb_jnspengeluaran.alamattoko, tb_pajak.ppn, tb_pajak.pph21, tb_pajak.pph22, tb_pajak.pph23, tb_pajak.pphlain
        // FROM tb_transaksi JOIN tb_saldoawal ON  tb_saldoawal.id_saldo = tb_transaksi.id_saldo 
        // JOIN tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran
        // JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi
        // WHERE tb_saldoawal.id_saldo = $id_saldo ")->result();

        // $data['jumtot'] = $this->db->query(" SELECT SUM(saldomasuk) as tot FROM tb_saldoawal ")->result();
        // $data['jumkel'] = $this->db->query(" SELECT SUM(tb_transaksi.jumlah) as totkel 
        // FROM tb_saldoawal JOIN tb_transaksi ON  tb_saldoawal.id_saldo = tb_transaksi.id_saldo ")->result();

        // $data['idsaldo'] = $this->db->query(" SELECT * FROM tb_saldoawal WHERE id_saldo = $id_saldo LIMIT 1")->result();

        $data['laporan'] = $this->db->query(" SELECT tb_transaksi.kode_rekening, tb_jnspengeluaran.uraian, tb_transaksi.tgltransaksi, tb_transaksi.notransaksi, tb_transaksi.jumlah, tb_transaksi.carapembayaran, tb_transaksi.namatoko, tb_transaksi.alamattoko, tb_pajak.ppn, tb_pajak.pph21, tb_pajak.pph22, tb_pajak.pph23, tb_pajak.pphlain
        FROM tb_transaksi JOIN tb_saldoawal ON  tb_saldoawal.id_saldo = tb_transaksi.id_saldo 
        JOIN tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran
        JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi
        WHERE tb_saldoawal.id_saldo = $id_saldo ")->result();

        $data['idsaldo'] = $this->db->query(" SELECT * FROM tb_saldoawal WHERE id_saldo = $id_saldo LIMIT 1")->result();
        $data['jumsisa'] = $this->db->query(" SELECT SUM(jumlahsaldosisa) as jumsis FROM tb_saldoawal WHERE id_saldo = $id_saldo")->result();
        $data['jumtunai'] = $this->db->query(" SELECT SUM(tb_transaksi.jumlah) as tunai FROM tb_transaksi  JOIN tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran  WHERE tb_transaksi.id_saldo = $id_saldo AND tb_transaksi.carapembayaran = 'Tunai' ")->result();
        $data['jumnontunai'] = $this->db->query(" SELECT SUM(tb_transaksi.jumlah) as nontunai FROM tb_transaksi JOIN  tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran WHERE tb_transaksi.id_saldo = $id_saldo AND tb_transaksi.carapembayaran = 'Non-Tunai' ")->result();

        $data['jumppn'] = $this->db->query(" SELECT SUM(ppn) as ppn FROM tb_pajak  WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpph21'] = $this->db->query(" SELECT SUM(pph21) as pph21 FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpph22'] = $this->db->query(" SELECT SUM(pph22) as pph22 FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpph23'] = $this->db->query(" SELECT SUM(pph23) as pph23 FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpphlain'] = $this->db->query(" SELECT SUM(pphlain) as pphlain FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();

        $data['bendahara'] = $this->db->query(" SELECT * FROM tb_user WHERE hakakses = 'bendahara' ")->result();
        $data['kadin'] = $this->db->query("SELECT * FROM tb_user WHERE hakakses = 'kadin' LIMIT 1")->result();        

        // $data['pembantu'] = $this->db->query("SELECT * FROM tb_user WHERE hakakses = 'pembantu' LIMIT 1")->result();


        $this->load->view('kadin/cetak_laporan', $data);
    }

    public function laporan_transaksi()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('laporan/laporan_transaksi');
        $this->load->view('templates_admin/footer');
    }

    public function pilih_tanggal_transaksi()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $data['inputan1'] = [$tanggal_awal];
        $data['inputan2'] = [$tanggal_akhir];
        $data['laporan_transaksi'] = $this->db->query("SELECT * FROM tb_transaksi WHERE tgltransaksi BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ")->result();
        $data['kadin'] = $this->db->query("SELECT * FROM tb_user WHERE hakakses = 'kadin' AND status = 'Aktif' ")->result();
        $this->load->view('laporan/cetak_laporan_transaksi', $data);
    }

    public function pilih_bulan_transaksi()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['laporan_transaksi'] = $this->db->query("SELECT * FROM tb_transaksi WHERE MONTH(tgltransaksi) = '$bulan' AND YEAR(tgltransaksi) = '$tahun' ")->result();
        $data['kadin'] = $this->db->query("SELECT * FROM tb_user WHERE hakakses = 'kadin' AND status = 'Aktif' ")->result();
        $this->load->view('laporan/cetak_laporan_transaksi', $data);
    }

    public function pilih_tahun_transaksi()
    {
        $tahun = $this->input->post('tahun');

        $data['laporan_transaksi'] = $this->db->query("SELECT * FROM tb_transaksi WHERE YEAR(tgltransaksi) = '$tahun' ")->result();
        $data['kadin'] = $this->db->query("SELECT * FROM tb_user WHERE hakakses = 'kadin' AND status = 'Aktif' ")->result();
        $this->load->view('laporan/cetak_laporan_transaksi', $data);
    }


    public function laporan_saldo()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('laporan/laporan_saldo');
        $this->load->view('templates_admin/footer');
    }

    public function pilih_tanggal_saldo()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $data['inputan1'] = [$tanggal_awal];
        $data['inputan2'] = [$tanggal_akhir];
        $data['laporan_saldo'] = $this->db->query("SELECT * FROM tb_saldoawal WHERE tglsaldomasuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ")->result();
        $data['kadin'] = $this->db->query("SELECT * FROM tb_user WHERE hakakses = 'kadin' AND status = 'Aktif' ")->result();
        $this->load->view('laporan/cetak_laporan_saldo', $data);
    }

    public function pilih_bulan_saldo()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['kadin'] = $this->db->query("SELECT * FROM tb_user WHERE hakakses = 'kadin' AND status = 'Aktif' ")->result();
        $data['laporan_saldo'] = $this->db->query("SELECT * FROM tb_saldoawal WHERE MONTH(tglsaldomasuk) = '$bulan' AND YEAR(tglsaldomasuk) = '$tahun' ")->result();
        $this->load->view('laporan/cetak_laporan_saldo', $data);
    }

    public function pilih_tahun_saldo()
    {
        $tahun = $this->input->post('tahun');

        $data['laporan_saldo'] = $this->db->query("SELECT * FROM tb_saldoawal WHERE YEAR(tglsaldomasuk) = '$tahun' ")->result();
        $data['kadin'] = $this->db->query("SELECT * FROM tb_user WHERE hakakses = 'kadin' AND status = 'Aktif' ")->result();
        $this->load->view('laporan/cetak_laporan_saldo', $data);
    }



    public function laporan_pajak()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('laporan/laporan_pajak');
        $this->load->view('templates_admin/footer');
    }

    public function pilih_tanggal_pajak()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $data['inputan1'] = [$tanggal_awal];
        $data['inputan2'] = [$tanggal_akhir];
        $data['laporan_pajak'] = $this->db->query("SELECT * FROM tb_pajak WHERE tgldok BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ")->result();

        $data['kadin'] = $this->db->query("SELECT * FROM tb_user WHERE hakakses = 'kadin' AND status = 'Aktif' ")->result();
        $this->load->view('laporan/cetak_laporan_pajak', $data);
    }

    public function pilih_bulan_pajak()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['laporan_pajak'] = $this->db->query("SELECT * FROM tb_pajak WHERE MONTH(tgldok) = '$bulan' AND YEAR(tgldok) = '$tahun' ")->result();

        $data['kadin'] = $this->db->query("SELECT * FROM tb_user WHERE hakakses = 'kadin' AND status = 'Aktif' ")->result();
        $this->load->view('laporan/cetak_laporan_pajak', $data);
    }

    public function pilih_tahun_pajak()
    {
        $tahun = $this->input->post('tahun');

        $data['laporan_pajak'] = $this->db->query("SELECT * FROM tb_pajak WHERE YEAR(tgldok) = '$tahun' ")->result();
        $data['kadin'] = $this->db->query("SELECT * FROM tb_user WHERE hakakses = 'kadin' AND status = 'Aktif' ")->result();
        $this->load->view('laporan/cetak_laporan_pajak', $data);
    }
}
