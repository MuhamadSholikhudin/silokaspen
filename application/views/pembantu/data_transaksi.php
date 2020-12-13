<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
        <?php
        function rupiah($angka)
        {

            $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
            return $hasil_rupiah;
        }
        ?>

        <div class="clearfix"></div>

        <div class="bg-white p-3">
            <h3 class="text-center">Data Transaksi</h3>
            <a href="<?= base_url('pembantu/transaksi') ?>" class="btn btn-primary">Tambah Transaksi</a>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12 table-responsive" border="1">
                    <table id="example" class="display text-dark" border="1" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Tgl Transaksi</th>
                                <th>Kode saldo</th>
                                <th>Jenis Pengeluaran</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($transaksi as $tran) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td> <?php if ($tran->status == 0) { ?>
                                            <a href="<?= base_url('pembantu/edit_transaksi/') . $tran->notransaksi ?>"><?= $tran->notransaksi ?></a></td>
                                <?php   } else { ?>
                                    <?= $tran->notransaksi ?>
                                <?php  } ?>
                                </td>
                                <td><?= $tran->tgltransaksi ?></td>
                                <td><?= $tran->id_saldo ?></td>
                                <td><?= $tran->kdjnspengeluaran ?></td>
                                <td><?= rupiah($tran->jumlah)  ?></td>
                                <td>
                                    <a class="btn btn-warning text-right" target="blank" href="<?= base_url('pembantu/cetak_transaksi/' . $tran->notransaksi) ?>"> <i class="fa fa-print"></i> Cetak</a>
                                    <a class="btn btn-danger text-right" href="<?= base_url('pembantu/hapus_transaksi/' . $tran->notransaksi) ?>"> <i class="fa fa-remove"></i> Hapus</a>
                                </td>
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
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>