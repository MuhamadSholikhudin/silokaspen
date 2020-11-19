<div class="right_col " role="main" style="min-height: 4546px;">
    <div class>
        <div class="page-title">


            <div class="row  bg-white">

                <div class="col-lg-12 text-center">

                    <h3>DATA PENGGUNA </h3>
                    
                </div>
                <div class="col-lg-12 p-4">
                        <a href="<?= base_url('bendahara/tambah_pengguna') ?>" class="btn btn-primary">Tambah Pengguna</a>
                    <table class="table  table-bordered" id="example">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Username</th>
                                <th scope="col">Nip</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">telephone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($user as $sal) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><a href="<?= base_url('bendahara/pengguna_edit/') . $sal->idusername ?>"><?= $sal->username ?></a></td>
                                    <td><?= $sal->nip ?></td>
                                    <td><?= $sal->namalengkap ?></td>
                                    <td><?= $sal->telepon ?></td>
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