<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
        <div class="clearfix"></div>
        <div class="bg-white p-3">
            <h3 class="text-center">Data Pajak</h3>
            <a href="<?= base_url('pembantu/pajak') ?>" class="btn btn-primary">Tambah Pajak</a>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12" border="1">
                    <table id="example" class="display text-dark" border="1" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Dokumen</th>
                                <th>tgl Dokumen</th>
                                <th>Jenis Pengeluaran</th>
                                <th>Kode Saldo</th>
                                <th>ppn</th>
                                <th>pph 21</th>
                                <th>pph 22</th>
                                <th>pph 23</th>
                                <th>pph lain</th>
                                <th>jumlah</th>
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
                                    <td><?= $paj->kdsaldo ?></td>
                                    <td><?= $paj->ppn ?></td>
                                    <td><?= $paj->pph21 ?></td>
                                    <td><?= $paj->pph22 ?></td>
                                    <td><?= $paj->pph23 ?></td>
                                    <td><?= $paj->pphlain ?></td>
                                    <td><?= $paj->jumlah ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>No Dokumen</th>
                                <th>tgl Dokumen</th>
                                <th>Jenis Pengeluaran</th>
                                <th>Kode Saldo</th>
                                <th>ppn</th>
                                <th>pph 21</th>
                                <th>pph 22</th>
                                <th>pph 23</th>
                                <th>pph lain</th>
                                <th>jumlah</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>