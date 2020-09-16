<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
       

        <div class="clearfix"></div>

        <div class="row">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Laporan BKU Pemerintah Kabupaten Kudus Bulan
                        <?php foreach ($idsaldo as $ds) : ?>
                            <?= $ds->periodebulan ?>&nbsp;<?= $ds->periodetahun ?>
                        <?php endforeach; ?>
                    </h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">


                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Rekening</th>
                                    <th>Uraiaan</th>
                                    <th>Tanggal</th>
                                    <th>No BKU</th>
                                    <th>Tunai</th>
                                    <th>Non Tunai</th>
                                    <th>Terima UP</th>

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
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td>Uraian</td>
                                    <td>Tanggal</td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Panjar</td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>pph23</td>
                                    <td>pphlain</td>

                                </tr>
                                <?php foreach ($jumif as $ju) : ?>
                                    <?php if ($ju->status == 1) { ?>
                                        <form action="<?= base_url('kadin/acc_laporan/') ?>" method="post" enctype="multipart/form-data">

                                            <?php foreach ($idsaldo as $ds) : ?>
                                                <input type="hidden" name="kdsaldo" value="<?= $ds->kdsaldo ?>">
                                            <?php endforeach; ?>
                                            <?php $no = 1; ?>
                                            <?php foreach ($laporan as $lap) : ?>
                                                <tr>
                                                    <th scope="row"><?= $no++ ?></th>
                                                    <td><?= $lap->kode_rekening ?></td>
                                                    <td><?= $lap->uraian ?></td>
                                                    <td><?= $lap->tgltransaksi ?></td>

                                                    <td><?= $lap->notransaksi ?><input type="hidden" name="notransaksi[]" value="<?= $lap->notransaksi ?>">
                                                        <input type="hidden" name="status[]" value="2"></td>
                                                    <?php if ($lap->carapembayaran == 'tunai') { ?>
                                                        <td><?= $lap->jumlah ?></td>
                                                        <td>0</td>
                                                    <?php } elseif ($lap->carapembayaran == 'nontunai') { ?>
                                                        <td>0</td>
                                                        <td><?= $lap->jumlah ?></td>
                                                    <?php } ?>
                                                    <td></td>
                                                    <td><?= $lap->namatoko ?></td>
                                                    <td><?= $lap->alamattoko ?></td>
                                                    <td><?= $lap->ppn ?></td>
                                                    <td><?= $lap->pph21 ?></td>
                                                    <td><?= $lap->pph22 ?></td>
                                                    <!-- <td>pph23</td>
                                        <td>pphlain</td> -->
                                                    <td><?= $lap->pph23 ?></td>
                                                    <td><?= $lap->pphlain ?></td>
                                                </tr>
                                            <?php endforeach; ?>

                                            <tr>
                                                <td colspan="5" class="text-center">Jumlah</td>
                                                <td>
                                                    <?php foreach ($jumtunai as $jum) :
                                                        echo  $jum->tunai;
                                                    endforeach;    ?>
                                                </td>
                                                <td><?php foreach ($jumnontunai as $jum) :
                                                        echo  $jum->nontunai;
                                                    endforeach;    ?></td>
                                                <td><?php foreach ($idsaldo as $jum) :
                                                        echo  $jum->saldomasuk;
                                                    endforeach;    ?></td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>5</td>
                                                <td>6</td>
                                                <td>7</td>
                                                <td>8</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-center"> Saldo/disetor Bendahara pengeluaran</td>
                                                <td><?php foreach ($jumsisa as $jum) :
                                                        echo  $jum->jumsis;
                                                    endforeach;    ?></td>
                                                </td>
                                                <td></td>
                                                <td>Sisa</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>5</td>
                                                <td>6</td>
                                                <td>7</td>

                                            </tr>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-8">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp; </td>
                                        </tr>
                                        <tr>
                                            <td> Mengetahui</td>
                                        </tr>
                                        <tr>
                                            <td>Pejabat Pelaksana teknis </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp; </td>
                                        </tr>
                                        <tr>
                                            <td><div class="btn-sm btn-primary text-center">Ter-ACC</div> </td>
                                        </tr>

                                        <tr>
                                            <td>&nbsp; </td>
                                        </tr>

                                        <tr>
                                            <td>ENDANG LISTIYANI, SE</td>
                                        </tr>
                                        <tr>
                                            <td>NIP. 19640726 198603 2 012</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-sm-4">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Kudus, 30 Desember 2019 </td>
                                        </tr>
                                        <tr>
                                            <td> Pembantu Bendahara Pengeluaran Belanja Langsung</td>
                                        </tr>
                                        <tr>
                                            <td>Disdikpora Kabupaten Kudus </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp; </td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn-sm btn-primary" type="submit">ACC</button> </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp; </td>
                                        </tr>

                                        <tr>
                                            <td>DWI BUDIHARTANTI</td>
                                        </tr>
                                        <tr>
                                            <td>NIP. 19640726 198603 2 012</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </form>
                            <?php } elseif ($ju->status == 2) { ?>
                                <form action="<?= base_url('kadin/un_acc/') ?>" method="post" enctype="multipart/form-data">

                                    <?php foreach ($idsaldo as $ds) : ?>
                                        <input type="hidden" name="kdsaldo" value="<?= $ds->kdsaldo ?>">
                                    <?php endforeach; ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($laporan as $lap) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $lap->kode_rekening ?></td>
                                            <td><?= $lap->uraian ?></td>
                                            <td><?= $lap->tgltransaksi ?></td>

                                            <td><?= $lap->notransaksi ?><input type="hidden" name="notransaksi[]" value="<?= $lap->notransaksi ?>">
                                                <input type="hidden" name="status[]" value="1"></td>
                                            <?php if ($lap->carapembayaran == 'tunai') { ?>
                                                <td><?= $lap->jumlah ?></td>
                                                <td>0</td>
                                            <?php } elseif ($lap->carapembayaran == 'nontunai') { ?>
                                                <td>0</td>
                                                <td><?= $lap->jumlah ?></td>
                                            <?php } ?>
                                            <td></td>
                                            <td><?= $lap->namatoko ?></td>
                                            <td><?= $lap->alamattoko ?></td>
                                            <td><?= $lap->ppn ?></td>
                                            <td><?= $lap->pph21 ?></td>
                                            <td><?= $lap->pph22 ?></td>
                                            <!-- <td>pph23</td>
                                        <td>pphlain</td> -->
                                            <td><?= $lap->pph23 ?></td>
                                            <td><?= $lap->pphlain ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                    <tr>
                                        <td colspan="5" class="text-center">Jumlah</td>
                                        <td>
                                            <?php foreach ($jumtunai as $jum) :
                                                echo  $jum->tunai;
                                            endforeach;    ?>
                                        </td>
                                        <td><?php foreach ($jumnontunai as $jum) :
                                                echo  $jum->nontunai;
                                            endforeach;    ?></td>
                                        <td><?php foreach ($idsaldo as $jum) :
                                                echo  $jum->saldomasuk;
                                            endforeach;    ?></td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-center"> Saldo/disetor Bendahara pengeluaran</td>
                                        <td><?php foreach ($jumsisa as $jum) :
                                                echo  $jum->jumsis;
                                            endforeach;    ?></td>
                                        </td>
                                        <td></td>
                                        <td>Sisa</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>7</td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>&nbsp; </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Mengetahui</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pejabat Pelaksana teknis </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp; </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="btn-sm btn-primary text-center">Ter-ACC</div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp; </td>
                                                    </tr>

                                                    <tr>
                                                        <td>ENDANG LISTIYANI, SE</td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIP. 19640726 198603 2 012</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col-sm-4">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>Kudus, 30 Desember 2019 </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Pembantu Bendahara Pengeluaran Belanja Langsung</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Disdikpora Kabupaten Kudus </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp; </td>
                                                    </tr>
                                                    <tr>
                                                        <td><button class="btn-sm btn-danger" type="submit">Un-ACC</button> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp; </td>
                                                    </tr>

                                                    <tr>
                                                        <td>DWI BUDIHARTANTI</td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIP. 19640726 198603 2 012</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                </form>
                            <?php } ?>

                        <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>