<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>

        <div class="bg-white p-3">
            <h3 class="text-center">Data Jenis Pengeluaran </h3>
            <a href="<?= base_url('bendahara/jenis_pengeluaran') ?>" class="btn btn-primary">Tambah jenis pengeluaran</a>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12" border="1">
                    <table id="example" class="display text-dark" border="1" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">No</th>
                                <th>Id Jenis Pengeluaran</th>
                                <th>Kode Rekening</th>
                                <th>Uraian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($jnspengeluaran as $sal) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><a href="<?= base_url('bendahara/edit_jenis_pengeluaran/') . $sal->kdjnspengeluaran ?>"><?= $sal->kdjnspengeluaran ?></a></td>
                                    <td><?= $sal->kode_rekening ?></td>
                                    <td><?= $sal->uraian ?></td>
                                    <td>
                                        <a href="<?= base_url('bendahara/edit_jenis_pengeluaran/') . $sal->kdjnspengeluaran ?>" class="btn btn-success"><i class="fa fa-edit"></i> &nbsp;Edit </a>
                                        <a href="<?= base_url('bendahara/hapus_jenis_pengeluaran/') . $sal->kdjnspengeluaran ?>" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp;Hapus </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id Jenis Pengeluaran</th>
                                <th>Kode Rekening</th>
                                <th>Uraian</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>