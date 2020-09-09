<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
        <div class="page-title">
            <div class="title_center">
                <h3>Selamat datang, <?= $this->session->userdata('namalengkap') ?> <small> Bendahara Disdikpora</small></h3>
            </div>

            <div class="row">
                <div class="col-lg-8 mt-4">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($bku as $sal) : ?>

                            <li class="list-group-item">
                                <h5><a href="<?= base_url('bendahara/laporan_bku/') . $sal->kdsaldo ?>">Laporan Buku Kas Umum Bulan <?= $sal->periodebulan . ' ' . $sal->periodetahun ?></a></h5>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clearfix "></div>


    </div>
</div>