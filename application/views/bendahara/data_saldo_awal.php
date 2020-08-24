<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>

        <div class="bg-white p-3">
            <h3 class="text-center">Data Saldo </h3>
            <a href="<?= base_url('bendahara/saldo_awal') ?>" class="btn btn-primary">Tambah Saldo</a>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12" border="1">
                    <table id="example" class="display text-dark" border="1" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Saldo</th>
                                <th>Tgl saldo Masuk</th>
                                <th>Saldo Masuk</th>
                                <th>Periode Bulan</th>
                                <th>Periode tahun</th>
                                <th>Tgl Saldo Sisa</th>
                                <th>Jumlah Saldo Sisa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($saldo as $sal) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><a href="<?= base_url('bendahara/edit_saldo_awal/') . $sal->kdsaldo ?>"><?= $sal->kdsaldo ?></a></td>
                                    <td><?= $sal->tglsaldomasuk ?></td>
                                    <td><?= $sal->saldomasuk ?></td>
                                    <td><?= $sal->periodebulan ?></td>
                                    <td><?= $sal->periodetahun ?></td>
                                    <td><?= $sal->tglsaldosisa ?></td>
                                    <td><?= $sal->jumlahsaldosisa ?></td>
                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Saldo</th>
                                <th>Tgl saldo Masuk</th>
                                <th>Saldo Masuk</th>
                                <th>Periode Bulan</th>
                                <th>Periode tahun</th>
                                <th>Tgl Saldo Sisa</th>
                                <th>Jumlah Saldo Sisa</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>