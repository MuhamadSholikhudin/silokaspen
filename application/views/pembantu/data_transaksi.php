<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>

        <div class="bg-white p-3">
            <h3 class="text-center">Data Transaksi</h3>
            <a href="<?= base_url('pembantu/transaksi') ?>" class="btn btn-primary">Tambah Transaksi</a>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12" border="1">
                    <table id="example" class="display text-dark" border="1" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Tgl Transaksi</th>
                                <th>Kode saldo</th>
                                <th>Jenis Pengeluaran</th>
                                <th>Jenis Transaksi</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($transaksi as $tran) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><a href="<?= base_url('pembantu/edit_transaksi/') . $tran->notransaksi ?>"><?= $tran->notransaksi ?></a></td>
                                    <td><?= $tran->tgltransaksi ?></td>
                                    <td><?= $tran->kdsaldo ?></td>
                                    <td><?= $tran->kdjnspengeluaran ?></td>
                                    <td><?= $tran->jnstransaksi ?></td>
                                    <td><?= $tran->jumlah ?></td>
                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Tgl Transaksi</th>
                                <th>Kode saldo</th>
                                <th>Jenis Pengeluaran</th>
                                <th>Jenis Transaksi</th>
                                <th>Jumlah</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>