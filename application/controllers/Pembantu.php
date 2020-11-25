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
        $this->load->view('templates_admin/footer');
    }

    public function data_pajak()
    {
        // $data['pajak'] = $this->Model_pajak->tampil_data()->result();
        // $data['kdsaldo'] = $this->db->query("SELECT kdsaldo FROM tb_saldoawal ")->result();
$data['pajak'] = $this->db->query("SELECT * FROM tb_pajak JOIN tb_transaksi ON tb_pajak.notransaksi = tb_transaksi.notransaksi")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('pembantu/data_pajak', $data);
        $this->load->view('templates_admin/footer');
    }

    public function pajak()
    {
        $data['kdjnspengeluaran'] = $this->Model_jnspengeluaran->tampil_data()->result();
        $data['transaksi'] = $this->db->query("SELECT * FROM tb_transaksi WHERE notransaksi NOT IN(SELECT notransaksi FROM tb_pajak)")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('pembantu/pajak', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_pajak($nodok)
    {
        $where = array('nodok' => $nodok);
        $data['pajak'] = $this->Model_pajak->edit_pajak($where, 'tb_pajak')->result();

        $data['kdjnspengeluaran'] = $this->Model_jnspengeluaran->tampil_data()->result();
        $data['kdsaldo'] = $this->db->query("SELECT kdsaldo FROM tb_saldoawal ")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('pembantu/edit_pajak', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetak_pajak($nodok)
    {
        $where = array('nodok' => $nodok);
        $data['pajak'] = $this->Model_pajak->edit_pajak($where, 'tb_pajak')->result();

        $data['kdjnspengeluaran'] = $this->Model_jnspengeluaran->tampil_data()->result();
        $data['kdsaldo'] = $this->db->query("SELECT kdsaldo FROM tb_saldoawal ")->result();

 
        $this->load->view('pembantu/cetak_pajak', $data);

    }
    public function hapus_pajak($nodok)
    {

        $filter = $this->db->query("SELECT tb_transaksi.status FROM tb_pajak JOIN tb_transaksi ON tb_pajak.notransaksi = tb_transaksi.notransaksi WHERE   nodok = '$nodok' ")->result();
 
        if ($filter > 1) {
            redirect('pembantu/data_pajak/');
        } elseif ($filter < 2) {
            $where = ['nodok' => $nodok];
            $this->Model_pajak->hapus_data($where, 'tb_pajak');
            redirect('pembantu/data_pajak/');
        }
    }



    public function data_transaksi()
    {
        $data['transaksi'] = $this->Model_transaksi->tampil_data()->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('pembantu/data_transaksi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function transaksi()
    {
        $data['kdjnspengeluaran'] = $this->Model_jnspengeluaran->tampil_data()->result();
        $data['kdsaldo'] = $this->db->query("SELECT kdsaldo FROM tb_saldoawal WHERE status = 0")->result();
        $data['transaksi'] = $this->db->query("SELECT * FROM tb_transaksi ")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('pembantu/transaksi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_transaksi($notransaksi)
    {

        $where = array('notransaksi' => $notransaksi);
        $data['transaksi'] = $this->Model_transaksi->edit_transaksi($where, 'tb_transaksi')->result();

        $data['kdjnspengeluaran'] = $this->Model_jnspengeluaran->tampil_data()->result();
        $data['kdsaldo'] = $this->db->query("SELECT kdsaldo FROM tb_saldoawal ")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('pembantu/edit_transaksi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetak_transaksi($notransaksi)
    {

        $where = array('notransaksi' => $notransaksi);
        $data['transaksi'] = $this->Model_transaksi->edit_transaksi($where, 'tb_transaksi')->result();

        $data['kdjnspengeluaran'] = $this->Model_jnspengeluaran->tampil_data()->result();
        $data['kdsaldo'] = $this->db->query("SELECT kdsaldo FROM tb_saldoawal ")->result();

       
        $this->load->view('pembantu/cetak_transaksi', $data);

    }


    public function tambah_transaksi()
    {

        $notransaksi = $this->input->post('notransaksi');
        $tgltransaksi = $this->input->post('tgltransaksi');
        $idusername = $this->input->post('idusername');
        $kdsaldo = $this->input->post('kdsaldo');
        $kdjnspengeluaran = $this->input->post('kdjnspengeluaran');
        $kode_rekening = $this->input->post('kode_rekening');
        $uraian = $this->input->post('uraian');
        $jumlah = $this->input->post('jumlah');
        $sisa = $this->input->post('sisa');

        $cari = $this->db->query("SELECT notransaksi FROM tb_transaksi WHERE notransaksi = $notransaksi LIMIT 1")->num_rows();

        if($cari == 1){
            $this->session->set_flashdata("message", "<script>Swal.fire('ERROR', 'Data Transaksi Gagal di tambahkan karena Nomer Transaksi sudah ada', 'error')</script>");
            redirect('pembantu/transaksi');
        }else{
            $jumlahsaldosisa = $sisa - $jumlah;

            $gambar = $_FILES['gambar']['name'];
            if ($gambar = '') {
            } else {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo "Gambar Gagal Di Upload";
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }

            $data = array(
                'notransaksi' => $notransaksi,
                'tgltransaksi' => $tgltransaksi,
                'idusername' => $idusername,
                'kdsaldo' => $kdsaldo,
                'kdjnspengeluaran' => $kdjnspengeluaran,
                'kode_rekening' => $kode_rekening,
                'uraian' => $uraian,
                'jumlah' => $jumlah,
                'gambar' => $gambar
            );

            $datat = array(
                'jumlahsaldosisa' => $jumlahsaldosisa
            );

            $wheret = array(
                'kdsaldo' => $kdsaldo
            );

            $this->Model_saldoawal->update_datat($wheret, $datat, 'tb_saldoawal');

            $this->Model_transaksi->tambah_transaksi($data, 'tb_transaksi');

            $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Transaksi berhasil di tambahkan', 'success')</script>");

            redirect('pembantu/data_transaksi');
        }


        
    }

    public function tambah_pajak()
    {

        $nodok = $this->input->post('nodok');
        $tgldok = $this->input->post('tgldok');
        $idusername = $this->input->post('idusername');
        // $jumlah = $this->input->post('jumlah');
        $notransaksi = $this->input->post('notransaksi');
        $kdsaldo = $this->input->post('kdsaldo');
        $ppn = $this->input->post('ppn');
        $pph21 = $this->input->post('pph21');
        $pph22 = $this->input->post('pph22');
        $pph23 = $this->input->post('pph23');
        $pphlain = $this->input->post('pphlain');
        $sisa = $this->input->post('sisa');
        // $kdsaldo = $this->input->post('kdsaldo');

        $cari = $this->db->query("SELECT nodok FROM tb_pajak WHERE nodok = $nodok")->num_rows();
if($cari == 1){
            $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Pajak Gagal di tambahkan karena Nomer Dokumen sudah ada', 'error')</script>");

            redirect('pembantu/pajak');
}else{
            $jumlah = $ppn + $pph21 + $pph22 + $pph23 + $pphlain;
            $jumlahsaldosisa = $sisa - $jumlah;

            $gambar = $_FILES['gambar']['name'];
            if ($gambar = '') {
            } else {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo "Gambar Gagal Di Upload";
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nodok' => $nodok,
                'tgldok' => $tgldok,
                'idusername' => $idusername,
                'jumlah' => $jumlah,
                'notransaksi' => $notransaksi,
                'kdsaldo' => $kdsaldo,
                'ppn' => $ppn,
                'pph21' => $pph21,
                'pph22' => $pph22,
                'pph23' => $pph23,
                'pphlain' => $pphlain,
                'gambar' => $gambar
            );

            $datat = array(
                'jumlahsaldosisa' => $jumlahsaldosisa
            );

            $wheret = array(
                'kdsaldo' => $kdsaldo
            );

            $this->Model_saldoawal->update_datat($wheret, $datat, 'tb_saldoawal');

            $this->Model_pajak->tambah_pajak($data, 'tb_pajak');

            $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Pajak berhasil di tambahkan', 'success')</script>");
            redirect('pembantu/data_pajak');
        }      
        
    }

    public function edit_pajak_aksi()
    {

        $nodoklama = $this->input->post('nodoklama');
        $nodok = $this->input->post('nodok');
        $tgldok = $this->input->post('tgldok');
        $idusername = $this->input->post('idusername');
        // $kdjnspengeluaran = $this->input->post('kdjnspengeluaran');
        $kdsaldo = $this->input->post('kdsaldo');
        $ppn = $this->input->post('ppn');
        $pph21 = $this->input->post('pph21');
        $pph22 = $this->input->post('pph22');
        $pph23 = $this->input->post('pph23');
        $pphlain = $this->input->post('pphlain');
        
        $sisa = $this->input->post('sisa');
        $jumlahlama = $this->input->post('jumlahlama');

        $jumlah = $ppn + $pph21 + $pph22 + $pph23 + $pphlain;

        $jumlahselisih = $jumlahlama - $jumlah;

        // $jumlah = $jumlahbaru;
        $jumlahsaldosisa = $sisa + $jumlahselisih;

$data['pajak'] = $this->db->query("SELECT * FROM tb_pajak WHERE nodok = $nodoklama ")->result_array();

        // cek jika ada gambar yang akan diupload
        $upload_gambar = $_FILES['gambar']['name'];

        if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '2048';
            $config['upload_path'] = './uploads/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                // $old_gambar = $data['pajak']['gambar'];
                // if ($old_gambar != 'default.jpg') {
                //     unlink(FCPATH . 'uploads/' . $old_gambar);
                // }
                $new_gambar = $this->upload->data('file_name');
                $this->db->set('gambar', $new_gambar);
            } else {
                echo $this->upload->dispay_errors();
            }
        }
        $data = array(
            'nodok' => $nodok,
            'tgldok' => $tgldok,
            'idusername' => $idusername,
            'jumlah' => $jumlah,
            'kdsaldo' => $kdsaldo,
            'ppn' => $ppn,
            'pph21' => $pph21,
            'pph22' => $pph22,
            'pph23' => $pph23,
            'pphlain' => $pphlain
        );

        $this->db->set($data);
        $this->db->where('nodok', $nodoklama);
        $this->db->update('tb_pajak');


        $datat = array(
            'jumlahsaldosisa' => $jumlahsaldosisa
        );

        $wheret = array(
            'kdsaldo' => $kdsaldo
        );

        $this->Model_saldoawal->update_datat($wheret, $datat, 'tb_saldoawal');

        $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Pajak berhasil di Edit', 'success')</script>");
        redirect('pembantu/data_pajak/');
    }

    public function edit_transaksi_aksi()
    {
        $notransaksilama = $this->input->post('notransaksilama');
        $notransaksi = $this->input->post('notransaksi');
        $tgltransaksi = $this->input->post('tgltransaksi');
        $idusername = $this->input->post('idusername');
        $kdsaldo = $this->input->post('kdsaldo');
        $kdjnspengeluaran = $this->input->post('kdjnspengeluaran');
        $kode_rekening = $this->input->post('kode_rekening');
        $uraian = $this->input->post('uraian');
        $sisa = $this->input->post('sisa');


        $jumlahlama = $this->input->post('jumlahlama');
        $jumlahbaru = $this->input->post('jumlahbaru');

        $jumlahselisih = $jumlahbaru - $jumlahlama;

        $jumlah = $jumlahbaru;
        $jumlahsaldosisa = $sisa - $jumlahselisih;

        $data['transaksi'] = $this->db->query("SELECT * FROM tb_transaksi WHERE notransaksi = $notransaksilama ")->result_array();

        // cek jika ada gambar yang akan diupload
        $upload_gambar = $_FILES['gambar']['name'];

        if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '2048';
            $config['upload_path'] = './uploads/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                // $old_gambar = $data['pajak']['gambar'];
                // if ($old_gambar != 'default.jpg') {
                //     unlink(FCPATH . 'uploads/' . $old_gambar);
                // }
                $new_gambar = $this->upload->data('file_name');
                $this->db->set('gambar', $new_gambar);
            } else {
                echo $this->upload->dispay_errors();
            }
        }
        $data = array(
            'notransaksi' => $notransaksi,
            'tgltransaksi' => $tgltransaksi,
            'idusername' => $idusername,
            'kdsaldo' => $kdsaldo,
            'kdjnspengeluaran' => $kdjnspengeluaran,
            'kode_rekening' => $kode_rekening,
            'uraian' => $uraian,
            'jumlah' => $jumlah
        );

        $this->db->set($data);
        $this->db->where('notransaksi', $notransaksilama);
        $this->db->update('tb_transaksi');


        $datat = array(
            'jumlahsaldosisa' => $jumlahsaldosisa
        );

        $wheret = array(
            'kdsaldo' => $kdsaldo
        );

        $this->Model_saldoawal->update_datat($wheret, $datat, 'tb_saldoawal');


        $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Data Transaksi berhasil di Edit', 'success')</script>");
        redirect('pembantu/data_transaksi/');
    }

    public function hapus_transaksi($notransaksi)
    {
        $where = ['notransaksi' => $notransaksi];
        // $cara = $this->db->query("SELECT tb_transaksi.notransaksi FROM tb_transaksi JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi WHERE tb_transaksi.notransaksi = '$notransaksi' ")->num_rows();
        $cara = $this->db->query("SELECT * FROM tb_transaksi WHERE notransaksi = '$notransaksi' AND  status = 0 ")->num_rows();
$tran = $this->db->query("SELECT jumlah, kdsaldo FROM tb_transaksi WHERE notransaksi = '$notransaksi'");
        $paj = $this->db->query("SELECT jumlah FROM tb_pajak WHERE notransaksi = '$notransaksi'");

        $cam = $this->db->query("SELECT tb_saldoawal.jumlahsaldosisa, tb_saldoawal.kdsaldo, tb_transaksi.notransaksi, tb_transaksi.jumlah, tb_pajak.jumlah as jp FROM tb_transaksi JOIN tb_saldoawal ON tb_transaksi.kdsaldo = tb_saldoawal.kdsaldo JOIN tb_pajak ON tb_transaksi.notransaksi = tb_pajak.notransaksi WHERE tb_transaksi.notransaksi = '$notransaksi'");



        $trans = $cam->row();
        $trs = $trans->jumlah;
        $pk = $trans->jp;
        $kds = $trans->kdsaldo;
        $jls = $trans->jumlahsaldosisa;

        $total_hapus = $trs + $pk;
        $jumlahsalsisa = $total_hapus + $jls ;



        if ($cara < 1) {
            $this->session->set_flashdata("message", "<script>Swal.fire('Gagal', 'Tidak Bisa di Hapus !!', 'error')</script>");
            redirect('pembantu/data_transaksi/');
        } elseif ($cara > 0) {

            $datat = array(
                'jumlahsaldosisa' => $jumlahsalsisa
            );

            $wheret = [
                'kdsaldo' => $kds
            ];

            $this->Model_saldoawal->update_datat($wheret, $datat, 'tb_saldoawal');            
            $this->Model_transaksi->hapus_data($where, 'tb_transaksi');
            $this->Model_pajak->hapus_data($where, 'tb_pajak');
            $this->session->set_flashdata("message", "<script>Swal.fire('Sukses', 'Berhasil di Hapus', 'success')</script>");
            redirect('pembantu/data_transaksi/');
        }
    }

    function get_jnspengeluaran()
    {
        $this->load->model('Model_jnspengeluaran', 'dep_kategori', TRUE);
        // $hakakses = $this->input->post('hakakses');

        $jnspengeluaran = $this->dep_kategori->get_sub_jnspengeluaran();
        // $data['keca'] = $this->db->query("SELECT COUNT(kode_wilayah), kecamatan FROM wilayah GROUP BY kecamatan")->result();

        // if($hakakses == 3){

        // $keca = $this->dep_kategori->get_sub_desa($id_kec);
        if (count($jnspengeluaran) > 0) {

            $des_select_box = '';
            $des_select_box .= '<option value="" >Pilih Kode Jenis Pengeluaran</option>';
            foreach ($jnspengeluaran as $jnspen) {
                $des_select_box .= '<option value="' . $jnspen->kdjndpengeluaran . '" >' . $jnspen->kdjndpengeluaran . '</option>';
            }
            echo json_encode($des_select_box);
        }
        // }

    }

 
    function get_sub_kdsaldop()
    {
        $notransaksi = $this->input->post('id', TRUE);
        $data = $this->Model_saldoawal->get_sub_kdsaldop($notransaksi)->result();
        echo json_encode($data);
    }

    function get_sub_kdsaldo()
    {
        $kdsaldo = $this->input->post('id', TRUE);
        $data = $this->Model_saldoawal->get_sub_kdsaldo($kdsaldo)->result();
        echo json_encode($data);
    }
}
