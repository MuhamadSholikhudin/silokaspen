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
                                <th>No</th>
                                <th>Kode Jenis Pengeluaran</th>
                                <th>Nama Toko</th>
                                <th>Alamat Toko</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($jnspengeluaran as $sal) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><a href="<?= base_url('bendahara/edit_jenis_pengeluaran/') . $sal->kdjnspengeluaran ?>"><?= $sal->kdjnspengeluaran ?></a></td>
                                    <td><?= $sal->namatoko ?></td>
                                    <td><?= $sal->alamattoko ?></td>

                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Jenis Pengeluaran</th>
                                <th>Nama Toko</th>
                                <th>Alamat Toko</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>