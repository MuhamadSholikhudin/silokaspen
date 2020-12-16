<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
        <div class="clearfix"></div>
        <?php
        function rupiah($angka)
        {
            $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
            return $hasil_rupiah;
        }
        ?>
        <div class="bg-white p-3">
            <h3 class="text-center">Data Pajak</h3>
            <a href="<?= base_url('pembantu/pajak') ?>" class="btn btn-primary">Tambah Pajak</a>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12 table-responsive" border="1">
                    <div class="table-responsive">
                        <table id="example" class="display text-dark" border="1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Dokumen</th>
                                    <th>tgl Dokumen</th>
                                    <th>Nomer Transaksi</th>
                                    <th>Id Saldo</th>
                                    <th>ppn</th>
                                    <th>pph 21</th>
                                    <th>pph 22</th>
                                    <th>pph 23</th>
                                    <th>pph lain</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pajak as $paj) : ?>
                                    <tr>
                                        <td><?= $no++ ?> </td>
                                        <td><?php if ($paj->status == 0) { ?>
                                                <a href="<?= base_url('pembantu/edit_pajak/') .  $paj->nodok  ?>"><?= $paj->nodok ?></a>
                                            <?php   } else { ?>
                                                <?= $paj->nodok ?>
                                            <?php  } ?>
                                        </td>

                                        <td><?= $paj->tgldok ?></td>
                                        <td><?= $paj->notransaksi ?></td>
                                        <td><?= $paj->id_saldo ?></td>
                                        <td><?= rupiah($paj->ppn) ?></td>
                                        <td><?= rupiah($paj->pph21) ?></td>
                                        <td><?= rupiah($paj->pph22) ?></td>
                                        <td><?= rupiah($paj->pph23) ?></td>
                                        <td><?= rupiah($paj->pphlain) ?></td>
                                        <td>

                                            <!-- <a class="btn btn-danger text-right" href="<?= base_url('pembantu/hapus_pajak/' . $paj->nodok) ?>"> <i class="fa fa-remove"></i> Hapus</a> -->

                                            <?php if ($paj->status == 0) { ?>
                                                <a href="<?= base_url('pembantu/edit_pajak/') .  $paj->nodok  ?>" class="btn btn-success text-right" > <i class="fa fa-edit"></i> Edit</a>
                                            <?php   } else { ?>
                                                <a class="btn btn-warning text-right" target="blank"> <i class="fa fa-print"></i> Cetak</a>
                                            <?php  } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>No Dokumen</th>
                                    <th>tgl Dokumen</th>
                                    <th>Nomer Transaksi</th>
                                    <th>Kode Saldo</th>
                                    <th>ppn</th>
                                    <th>pph 21</th>
                                    <th>pph 22</th>
                                    <th>pph 23</th>
                                    <th>pph lain</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>