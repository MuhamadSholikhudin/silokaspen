<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
        <div class="page-title">


            <div class="row bg-white">


                <div class="col-lg-12 text-center">

                    <h3>Data Laporan Bendahara Kas Umum </h3>
                    <h3>Dinas Pendidikan dan Pemuda dan Olah raga</h3>
                    <h3>Kabupaten Kudus</h3>
                </div>
                <div class="col-lg-12 p-4">
                    <table class="table  table-bordered" id="example">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Laporan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($bku as $sal) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><a href="<?= base_url('kadin/laporan_bku/') . $sal->id_saldo ?>"> Laporan Buku Kas Umum Bulan <?= $sal->periodebulan ?>&nbsp;<?= $sal->periodetahun ?></a></td>
                                    <td>
                                        <?php if ($sal->status == 2) { ?>
                                            <a href="<?= base_url('kadin/cetak_bku/') . $sal->id_saldo ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-warning">Cetak</a>
                                        <?php
                                        } else { ?>
                                            <button class="btn btn-sm btn-primary">Belum Acc</button>

                                        <?php   }  ?>

                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>

        <div class="clearfix "></div>


    </div>
</div>