<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>

        <div class="page-title">
            <div class="title_center">
                <h3>Selamat datang, <?= $this->session->userdata('namalengkap') ?> <small> Bendahara Disdikpora</small></h3>
            <?php
            $tran = $this->db->query("SELECT jumlah FROM tb_transaksi WHERE notransaksi = 1");
               $paj = $this->db->query("SELECT jumlah FROM tb_pajak WHERE notransaksi = 1");

$row = $paj->row();

$li = $row->jumlah;
echo $li;

            ?>
            </div>

        </div>

        <div class="clearfix"></div>
        <br>
        <br>
        <div class="row">

            <div class="col-sm-12">
                <?php include "assets/gambar_pkl/beranda.txt" ?>
            </div>

        </div>
    </div>
</div>