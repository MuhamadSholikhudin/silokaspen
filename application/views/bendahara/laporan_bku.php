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
                    <div class="table-response">


                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Rekening</th>
                                    <th>Uraiaan</th>
                                    <th>Tanggal</th>
                                    <th>No BKU</th>
                                    <th>Tunai</th>
                                    <th>Non Tunai</th>

                                    <th>Nama Toko</th>
                                    <th>Alamat Toko</th>
                                    <th>Ppn</th>
                                    <th>Pph21</th>
                                    <th>Pph22</th>
                                    <th>Pph23</th>
                                    <th>Pph Lain</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($laporan as $lap) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td></td>
                                        <td><?= $lap->uraian ?></td>
                                        <td><?= $lap->tglsaldomasuk ?></td>

                                        <td><?= $lap->kdsaldo ?></td>
                                        <td>Tunai</td>
                                        <td>Non-Tunai</td>
                                        <td>Nama Toko</td>
                                        <td>Alamat Toko</td>
                                        <td>ppn</td>
                                        <td>pph21</td>
                                        <td>pph22</td>
                                        <!-- <td>pph23</td>
                                        <td>pphlain</td> -->
                                        <td><?= $lap->saldomasuk ?></td>
                                        <td><?= $lap->jumlah ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                <tr>
                                    <td colspan="4" class="text-center">Jumlah</td>

                                    <td>Jumlah</td>
                                    <td>
                                        <?php foreach ($jumtot as $jum) :
                                            echo  $jum->tot;
                                        endforeach;    ?>
                                    </td>
                                    <td><?php foreach ($jumkel as $jum) :
                                            echo  $jum->totkel;
                                        endforeach;    ?></td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-center"> Saldo/disetor Bendahara pengeluaran</td>

                                    <td>Saldo</td>
                                    <td></td>
                                    <td>Sisa</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-6">
                                <br>
                                <h6>Mengetahui</h6>
                                <h6>Pejabat Pelaksana teknis Kegiatan</h6>
                                <br>
                                <br>
                                <br>

                                <h6>ENDANG LISTIYANI, SE</h6>
                                <h6>NIP. 19640726 198603 2 012</h6>
                            </div>
                            <div class="col-sm-6">
                                <h6>Kudus, 30 Desember 2019</h6>
                                <h6>Pembantu Bendahara Pengeluaran Belanja Langsung</h6>
                                <h6>Disdikpora Kabupaten Kudus</h6>
                                <br>
                                <br>
                                <br>

                                <h6>DWI BUDIHARTANTI</h6>
                                <h6>NIP. 19860317 201406 2 002</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>