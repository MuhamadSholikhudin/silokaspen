<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
        

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
                                <th>Id saldo</th>
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
                                <td>
                                <?php
                                    $jnsp = $this->db->query("SELECT * FROM tb_jnspengeluaran WHERE kdjnspengeluaran = '$tran->kdjnspengeluaran' ");
                                $psj = $jnsp->row();
                                echo $psj->uraian;
   ?>
                            </td>
                                <td><?= rupiah($tran->jumlah)  ?></td>
                                <td>
                                    <?php
                                    $ur = $this->db->query("SELECT * FROM tb_pajak JOIN tb_transaksi ON tb_pajak.notransaksi = tb_transaksi.notransaksi   WHERE tb_transaksi.notransaksi = '$tran->notransaksi' AND  tb_transaksi.status < 1 ")->num_rows();
                                    $ir = $this->db->query("SELECT * FROM tb_pajak JOIN tb_transaksi ON tb_pajak.notransaksi = tb_transaksi.notransaksi   WHERE tb_transaksi.notransaksi = '$tran->notransaksi' AND  tb_transaksi.status > 0 ")->num_rows();
   
                                    // $kdj = $klx->kdjns; 
                                    if ($ir > 0) { ?>
                                        <button class="btn btn-dark text-right" > <i class="fa fa-check-square-o"></i> Di Acc</button>

                                    <?php } elseif ($ur > 0) {
                                        $pr = $this->db->query("SELECT * FROM tb_pajak JOIN tb_transaksi ON tb_pajak.notransaksi = tb_transaksi.notransaksi   WHERE tb_transaksi.notransaksi = '$tran->notransaksi' AND  tb_transaksi.status < 1 ");
                                        $pj = $pr->row();
                                        $urar = $pj->nodok;                                        
                                        ?>
                                        <a class="btn btn-success text-right"  href="<?= base_url('pembantu/edit_pajak/' . $urar) ?>"> <i class="fa fa-edit"></i> Edit Pajak</a>
                                    <?php } elseif ($ur < 1) { ?>
                                        <a class="btn btn-primary text-right"  href="<?= base_url('pembantu/input_pajak/' . $tran->notransaksi) ?>"> <i class="fa fa-pencil"></i> Input Pajak</a>
                                    <?php }  ?>

                                    

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
                                <th>Id saldo</th>
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