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
                                <h5><a href="<?= base_url('bendahara/laporan_bku/') . $sal->kdsaldo ?>">Laporan Buku Kas Umum Bulan <?= $sal->periodebulan . ' ' . $sal->periodetahun ?></a>
                                    <?php if ($sal->status == 2) { ?>
                                        <a href="<?= base_url('bendahara/cetak_bku/') . $sal->kdsaldo ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-warning">Cetak</a>
                                    <?php
                                    } else { ?>
                                        <button class="btn btn-sm btn-primary">Belum Acc</button>

                                    <?php   }
                                    ?>
                                </h5>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clearfix "></div>


    </div>
</div>