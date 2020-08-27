<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
        <div class="page-title">
            <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Laporan BKU <small>Pemerintah Kabupaten Kudus</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Uraiaan</th>
                                <th>kode saldo</th>
                                <th>Penerimaan</th>
                                <th>Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($laporan as $lap) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $lap->kdsaldo ?></td>
                                    <td><?= $lap->tglsaldomasuk ?></td>
                                    <td>a</td>
                                    <td><?= $lap->saldomasuk ?></td>
                                    <td><?= $lap->jumlah ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr>
                                <td colspan="3"></td>

                                <td>Total</td>
                                <td>
                                    <?php foreach ($jumtot as $jum) :
                                        echo  $jum->tot;
                                    endforeach;    ?>
                                </td>
                                <td><?php foreach ($jumkel as $jum) :
                                        echo  $jum->totkel;
                                    endforeach;    ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>

                                <td>Saldo</td>
                                <td></td>
                                <td>Sisa</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>


    </div>
</div>