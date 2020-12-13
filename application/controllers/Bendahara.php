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
$ceksaldo = $this->db->query(" SELECT * FROM tb_saldoawal WHERE status < 2 ORDER BY tglsaldosisa DESC LIMIT 1")->num_rows();
if($ceksaldo > 0){
            $this->session->set_flashdata("message", "<script>Swal.fire('Info', 'Saldo Sebelumnya belum selesai atau belum di Acc Kepala Dinas', 'info')</script>");

            redirect('bendahara/data_saldo_awal');

}elseif($ceksaldo < 1){

    // $data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $data['bulan'] = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('bendahara/saldo_awal', $data);
    $this->load->view('templates_admin/footer');
}

    }

    public function data_saldo_awal()
    {
        // $data['saldo'] = $this->Model_saldoawal->tampil_data()->result();
        $data['saldo'] = $this->db->query("SELECT * FROM tb_saldoawal ORDER BY tglsaldomasuk DESC")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/data_saldo_awal', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_saldo_awal($id_saldo)
    {
        $where = array('id_saldo' => $id_saldo);
        $data['saldo'] = $this->Model_saldoawal->edit_saldoawal($where, 'tb_saldoawal')->result();
        // $data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $data['bulan'] = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

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
$data['carapem'] = ['tunai', 'nontunai'];
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


    public function bku()
    {
        // $data['bku'] = $this->db->query("SELECT tb_pajak.id_saldo, tb_saldoawal.periodebulan, tb_saldoawal.periodetahun, tb_saldoawal.status FROM tb_pajak JOIN tb_saldoawal ON tb_pajak.id_saldo = tb_saldoawal.id_saldo GROUP BY id_saldo")->result();
        $data['bku'] = $this->db->query("SELECT * FROM tb_saldoawal  ORDER BY tglsaldomasuk DESC")->result();
        
$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/data_laporan_bku', $data);
        $this->load->view('templates_admin/footer');
    }

    public function laporan_bku($id_saldo)
    {
        $data['jumif'] = $this->db->get_where('tb_saldoawal', ['id_saldo' => $id_saldo])->result();

        $data['laporan'] = $this->db->query(" SELECT tb_transaksi.kode_rekening, tb_jnspengeluaran.uraian, tb_transaksi.tgltransaksi, tb_transaksi.notransaksi, tb_transaksi.jumlah, tb_transaksi.carapembayaran, tb_transaksi.namatoko, tb_transaksi.alamattoko, tb_pajak.ppn, tb_pajak.pph21, tb_pajak.pph22, tb_pajak.pph23, tb_pajak.pphlain
        FROM tb_transaksi JOIN tb_saldoawal ON  tb_saldoawal.id_saldo = tb_transaksi.id_saldo 
        JOIN tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran
        JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi
        WHERE tb_saldoawal.id_saldo = $id_saldo ")->result();

        $data['idsaldo'] = $this->db->query(" SELECT * FROM tb_saldoawal WHERE id_saldo = $id_saldo LIMIT 1")->result();
        $data['jumsisa'] = $this->db->query(" SELECT SUM(jumlahsaldosisa) as jumsis FROM tb_saldoawal WHERE id_saldo = $id_saldo")->result();
        $data['jumtunai'] = $this->db->query(" SELECT SUM(tb_transaksi.jumlah) as tunai FROM tb_transaksi  JOIN tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi WHERE tb_transaksi.id_saldo = $id_saldo AND tb_transaksi.carapembayaran = 'Tunai' ")->result();
        $data['jumnontunai'] = $this->db->query(" SELECT SUM(tb_transaksi.jumlah) as nontunai FROM tb_transaksi JOIN  tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi WHERE tb_transaksi.id_saldo = $id_saldo AND tb_transaksi.carapembayaran = 'Non-Tunai' ")->result();
               
        $data['jumppn'] = $this->db->query(" SELECT SUM(ppn) as ppn FROM tb_pajak  WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpph21'] = $this->db->query(" SELECT SUM(pph21) as pph21 FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpph22'] = $this->db->query(" SELECT SUM(pph22) as pph22 FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpph23'] = $this->db->query(" SELECT SUM(pph23) as pph23 FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpphlain'] = $this->db->query(" SELECT SUM(pphlain) as pphlain FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();

        $data['bendahara'] = $this->db->query(" SELECT * FROM tb_login WHERE hakakses = 'bendahara' ")->result();
$data['kadin'] = $this->db->query("SELECT * FROM tb_login WHERE hakakses = 'kadin' LIMIT 1")->result();        
        

$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/laporan_bku', $data);
        $this->load->view('templates_admin/footer');
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
        $data['jumtunai'] = $this->db->query(" SELECT SUM(tb_transaksi.jumlah) as tunai FROM tb_transaksi  JOIN tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi WHERE tb_transaksi.id_saldo = $id_saldo AND tb_transaksi.carapembayaran = 'Tunai' ")->result();
        $data['jumnontunai'] = $this->db->query(" SELECT SUM(tb_transaksi.jumlah) as nontunai FROM tb_transaksi JOIN  tb_jnspengeluaran ON tb_transaksi.kdjnspengeluaran = tb_jnspengeluaran.kdjnspengeluaran JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi WHERE tb_transaksi.id_saldo = $id_saldo AND tb_transaksi.carapembayaran = 'Non-Tunai' ")->result();

        $data['jumppn'] = $this->db->query(" SELECT SUM(ppn) as ppn FROM tb_pajak  WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpph21'] = $this->db->query(" SELECT SUM(pph21) as pph21 FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpph22'] = $this->db->query(" SELECT SUM(pph22) as pph22 FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpph23'] = $this->db->query(" SELECT SUM(pph23) as pph23 FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();
        $data['jumpphlain'] = $this->db->query(" SELECT SUM(pphlain) as pphlain FROM tb_pajak WHERE id_saldo = $id_saldo  ")->result();

        $data['bendahara'] = $this->db->query(" SELECT * FROM tb_login WHERE hakakses = 'bendahara' LIMIT 1 ")->result();
$data['pembantu'] = $this->db->query("SELECT * FROM tb_login WHERE hakakses = 'pembantu' LIMIT 1 ")->result();
        $data['kadin'] = $this->db->query("SELECT * FROM tb_login WHERE hakakses = 'kadin' LIMIT 1")->result();        


        $this->load->view('bendahara/cetak_laporan', $data);
    }

    public function tambah_saldoawal()
    {
        $id_saldo = $this->input->post('id_saldo');
        $tglsaldomasuk = $this->input->post('tglsaldomasuk');
        $periodebulan = $this->input->post('periodebulan');
        $periodetahun = $this->input->post('periodetahun');
        $saldomasuk = $this->input->post('saldomasuk');
        $tglsaldosisa = $this->input->post('tglsaldosisa');
        $jumlahsaldosisa = $this->input->post('jumlahsaldosisa');

        $akhirsisa = $jumlahsaldosisa + $saldomasuk;

        $data = array(
            'id_saldo' => $id_saldo,
            'tglsaldomasuk' => $tglsaldomasuk,
            'periodebulan' => $periodebulan,
            'periodetahun' => $periodetahun,
            'saldomasuk' => $saldomasuk,
            'tglsaldosisa' => $tglsaldosisa,
            'jumlahsaldosisa' => $akhirsisa
        );

        $this->Model_saldoawal->tambah_saldoawal($data, 'tb_saldoawal');
        $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Saldo Awal berhasil di tambahkan', 'success')</script>");

        redirect('bendahara/data_saldo_awal');
    }

    public function edit_saldoawal_aksi()
    {
        $id_saldolama = $this->input->post('id_saldolama');
        $id_saldo = $this->input->post('id_saldo');
        $tglsaldomasuk = $this->input->post('tglsaldomasuk');
        $periodebulan = $this->input->post('periodebulan');
        $periodetahun = $this->input->post('periodetahun');
        $saldomasuklama = $this->input->post('saldomasuklama');
        $saldomasukbaru = $this->input->post('saldomasukbaru');
        $tglsaldosisa = $this->input->post('tglsaldosisa');
        $jumlahsaldosisalama = $this->input->post('jumlahsaldosisalama');

        $saldoselisih = $saldomasukbaru - $saldomasuklama;

        $saldomasuk = $saldomasuklama + $saldoselisih;
        $jumlahsaldosisa = $jumlahsaldosisalama + $saldoselisih;

$cari = $this->db->query(" SELECT * FROM tb_saldoawal WHERE id_saldo = '$id_saldo' ")->num_rows();

        $data = array(
            'id_saldo' => $id_saldo,
            'tglsaldomasuk' => $tglsaldomasuk,
            'periodebulan' => $periodebulan,
            'periodetahun' => $periodetahun,
            'saldomasuk' => $saldomasuk,
            'tglsaldosisa' => $tglsaldosisa,
            'jumlahsaldosisa' => $jumlahsaldosisa
        );

        $where = [
            'id_saldo' => $id_saldolama
        ];

if($id_saldo == $id_saldolama ){
        

            $this->Model_saldoawal->update_data($where, $data, 'tb_saldoawal');
            $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Saldo Awal berhasil di Edit', 'success')</script>");
            redirect('bendahara/data_saldo_awal');

        }elseif($cari > 0){
            $this->session->set_flashdata("message", "<script>Swal.fire('Gagal', 'Data Saldo Awal Tidak berhasil di Edit id_saldo duplikat', 'info')</script>");
            redirect('bendahara/data_saldo_awal');
        }elseif($cari < 1){

            $this->Model_saldoawal->update_data($where, $data, 'tb_saldoawal');
            $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Saldo Awal berhasil di Edit', 'success')</script>");
            redirect('bendahara/data_saldo_awal');
        }
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
        $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Jenis Pengeluaran berhasil di tambahkan', 'success')</script>");

        redirect('bendahara/data_jenis_pengeluaran');
    }

    public function edit_jnspengeluaran_aksi()
    {
        $kdjnspengeluaranlama = $this->input->post('kdjnspengeluaranlama');
        $kdjnspengeluaran = $this->input->post('kdjnspengeluaran');
        $uraian = $this->input->post('uraian');
        $kode_rekening = $this->input->post('kode_rekening');

        $data = array(
            'kdjnspengeluaran' => $kdjnspengeluaran,
            'uraian' => $uraian,
            'kode_rekening' => $kode_rekening
        );

        $where = [
            'kdjnspengeluaran' => $kdjnspengeluaranlama
        ];

        $this->Model_jnspengeluaran->update_data($where, $data, 'tb_jnspengeluaran');
        $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Jenis Pengeluaran berhasil di Edit', 'success')</script>");

        redirect('bendahara/data_jenis_pengeluaran');
    }

    public function ajukan_laporan_bku()
    {
        $notransaksi = $this->input->post('notransaksi');
        $id = $this->input->post('id_saldo');

$jumtran = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi WHERE tb_transaksi.id_saldo = '$id' ")->num_rows();
if ($jumtran < 1 ){
            $this->session->set_flashdata("message", "<script>Swal.fire('Info', 'Data Laporan BKU Tidak dapat diajukan', 'info')</script>");

            redirect('bendahara/laporan_bku/' . $id);

}elseif ($jumtran > 0){

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

            $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Laporan BKU berhasil di Ajukan', 'success')</script>");

            redirect('bendahara/laporan_bku/' . $id);
}


        
    }

    public function batalkan_ajukan()
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
            'status' => 0

        ];
        $where = [
            'id_saldo' => $id
        ];

        $this->Model_saldoawal->update_data($where, $data, 'tb_saldoawal');

        $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Laporan BKU berhasil di batalkan Ajukannya', 'success')</script>");
        redirect('bendahara/laporan_bku/' . $id);
    }





    public function pengguna(){
        $data['user'] = $this->db->get('tb_login')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/pengguna', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_pengguna()
    {
        $data['user'] = $this->db->get('tb_login')->result();
        $data['hakakses'] = ['kadin', 'pembantu', 'bendahara'];

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/tambah_pengguna', $data);
        $this->load->view('templates_admin/footer');
    }

    public function pengguna_edit($idusername)
    {
        $where = array('idusername' => $idusername);
        $data['user'] = $this->db->query("SELECT * FROM tb_login WHERE idusername = '$idusername' ")->result();
$data['hakakses'] = ['kadin', 'pembantu', 'bendahara'];
        $data['status_login'] = ['Aktif', 'Tidak Aktif'];
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('bendahara/edit_pengguna', $data);
        $this->load->view('templates_admin/footer');
    }


    public function tambah_tb_login_aksi()
    {
        $namalengkap = $this->input->post('namalengkap');
        $username = $this->input->post('username');
        $nip = $this->input->post('nip');
        $telepon = $this->input->post('telepon');
        $hakakses = $this->input->post('hakakses');
        $password = $this->input->post('password');

        $data = array(
            'nip' => $nip,
            'username' => $username,
            'password' => $password,
            'hakakses' => $hakakses,
            'telepon' => $telepon,
            'namalengkap' => $namalengkap,
        );

        $this->Model_tblogin->tambah_tb_login($data, 'tb_login');
        $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Jenis Pengeluaran berhasil di tambahkan', 'success')</script>");
        redirect('bendahara/pengguna/');
    }

    public function edit_tb_login_aksi()
    {
        $idusername = $this->input->post('idusername');
        $namalengkap = $this->input->post('namalengkap');
        $username = $this->input->post('username');
        $nip = $this->input->post('nip');
        $telepon = $this->input->post('telepon');
        $hakakses = $this->input->post('hakakses');
        $password = $this->input->post('password');
        $status_login = $this->input->post('status_login');
        
        $data = array(
            'nip' => $nip,
            'username' => $username,
            'password' => $password,
            'hakakses' => $hakakses,
            'telepon' => $telepon,
            'namalengkap' => $namalengkap,
            'status_login' => $status_login
        );

        $where = [
            'idusername' => $idusername
        ];

        $this->Model_tblogin->update_data($where, $data, 'tb_login');
        redirect('bendahara/pengguna/');
    }

}
