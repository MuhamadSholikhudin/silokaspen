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
        $data['pajak'] = $this->Model_pajak->tampil_data()->result();
        // $data['kdsaldo'] = $this->db->query("SELECT kdsaldo FROM tb_saldoawal ")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('pembantu/data_pajak', $data);
        $this->load->view('templates_admin/footer');
    }

    public function pajak()
    {
        $data['kdjnspengeluaran'] = $this->Model_jnspengeluaran->tampil_data()->result();
        $data['kdsaldo'] = $this->db->query("SELECT kdsaldo FROM tb_saldoawal ")->result();

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
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('pembantu/transaksi');
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

    public function tambah_transaksi()
    {

        $notransaksi = $this->input->post('notransaksi');
        $tgltransaksi = $this->input->post('tgltransaksi');
        $idusername = $this->input->post('idusername');
        $kdsaldo = $this->input->post('kdsaldo');
        $kdjnspengeluaran = $this->input->post('kdjnspengeluaran');
        $jnstransaksi = $this->input->post('jnstransaksi');
        $uraian = $this->input->post('uraian');
        $jumlah = $this->input->post('jumlah');

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
            'jnstransaksi' => $jnstransaksi,
            'uraian' => $uraian,
            'jumlah' => $jumlah,
            'gambar' => $gambar
        );

        $this->Model_transaksi->tambah_transaksi($data, 'tb_transaksi');
        redirect('pembantu/index');
    }

    public function tambah_pajak()
    {

        $nodok = $this->input->post('nodok');
        $tgldok = $this->input->post('tgldok');
        $idusername = $this->input->post('idusername');
        $jumlah = $this->input->post('jumlah');
        $kdjnspengeluaran = $this->input->post('kdjnspengeluaran');
        $kdsaldo = $this->input->post('kdsaldo');
        $ppn = $this->input->post('ppn');
        $pph21 = $this->input->post('pph21');
        $pph22 = $this->input->post('pph22');
        $pph23 = $this->input->post('pph23');
        $pphlain = $this->input->post('pphlain');

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
            'kdjnspengeluaran' => $kdjnspengeluaran,
            'kdsaldo' => $kdsaldo,
            'ppn' => $ppn,
            'pph21' => $pph21,
            'pph22' => $pph22,
            'pph23' => $pph23,
            'pphlain' => $pphlain,
            'gambar' => $gambar
        );

        $this->Model_pajak->tambah_pajak($data, 'tb_pajak');
        redirect('pembantu/index');
    }

    public function edit_pajak_aksi()
    {

        $nodok = $this->input->post('nodok');
        $tgldok = $this->input->post('tgldok');
        $idusername = $this->input->post('idusername');
        $jumlah = $this->input->post('jumlah');
        $kdjnspengeluaran = $this->input->post('kdjnspengeluaran');
        $kdsaldo = $this->input->post('kdsaldo');
        $ppn = $this->input->post('ppn');
        $pph21 = $this->input->post('pph21');
        $pph22 = $this->input->post('pph22');
        $pph23 = $this->input->post('pph23');
        $pphlain = $this->input->post('pphlain');

        // $data['pajak'] = $this->Model_pajak->edit_pajak($where, 'tb_pajak')->result();

        // cek jika ada gambar yang akan diupload
        $upload_gambar = $_FILES['gambar']['name'];

        if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '2048';
            $config['upload_path'] = './uploads/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $old_gambar = $data['pajak']['gambar'];
                if ($old_gambar != 'default.jpg') {
                    unlink(FCPATH . 'uploads/' . $old_gambar);
                }
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
            'kdjnspengeluaran' => $kdjnspengeluaran,
            'kdsaldo' => $kdsaldo,
            'ppn' => $ppn,
            'pph21' => $pph21,
            'pph22' => $pph22,
            'pph23' => $pph23,
            'pphlain' => $pphlain
        );

        $this->db->set($data);
        $this->db->where('nodok', $nodok);
        $this->db->update('tb_pajak');


        redirect('pembantu/data_pajak/');
    }

    public function edit_transaksi_aksi()
    {
        $notransaksi = $this->input->post('notransaksi');
        $tgltransaksi = $this->input->post('tgltransaksi');
        $idusername = $this->input->post('idusername');
        $kdsaldo = $this->input->post('kdsaldo');
        $kdjnspengeluaran = $this->input->post('kdjnspengeluaran');
        $jnstransaksi = $this->input->post('jnstransaksi');
        $uraian = $this->input->post('uraian');
        $jumlah = $this->input->post('jumlah');

        // $data['pajak'] = $this->Model_pajak->edit_pajak($where, 'tb_pajak')->result();

        // cek jika ada gambar yang akan diupload
        $upload_gambar = $_FILES['gambar']['name'];

        if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '2048';
            $config['upload_path'] = './uploads/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $old_gambar = $data['pajak']['gambar'];
                if ($old_gambar != 'default.jpg') {
                    unlink(FCPATH . 'uploads/' . $old_gambar);
                }
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
            'jnstransaksi' => $jnstransaksi,
            'uraian' => $uraian,
            'jumlah' => $jumlah
        );

        $this->db->set($data);
        $this->db->where('notransaksi', $notransaksi);
        $this->db->update('tb_transaksi');


        redirect('pembantu/data_transaksi/');
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
