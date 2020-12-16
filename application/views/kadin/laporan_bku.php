<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
        <div class="clearfix"></div>

        <div class="row">
            <div class="x_panel">
                <div class="x_title">

                    <?php foreach ($idsaldo as $ds) : ?>
                        <h2>Laporan BKU Pemerintah Kabupaten Kudus Bulan
                            <?php
                            if ($ds->periodebulan == '01') {
                                echo  'Januari';
                            } elseif ($ds->periodebulan == '02') {
                                echo  'Februari';
                            } elseif ($ds->periodebulan == '03') {
                                echo  'Maret';
                            } elseif ($ds->periodebulan == '04') {
                                echo  'April';
                            } elseif ($ds->periodebulan == '05') {
                                echo  'Mei';
                            } elseif ($ds->periodebulan == '06') {
                                echo  'Juni';
                            } elseif ($ds->periodebulan == '07') {
                                echo  'Juli';
                            } elseif ($ds->periodebulan == '08') {
                                echo  'Agustus';
                            } elseif ($ds->periodebulan == '09') {
                                echo  'September';
                            } elseif ($ds->periodebulan == '10') {
                                echo  'Oktober';
                            } elseif ($ds->periodebulan == '11') {
                                echo  'November';
                            } elseif ($ds->periodebulan == '12') {
                                echo  'Desember';
                            }
                            ?>
                            <?= $ds->periodetahun ?>
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
                                <?php foreach ($idsaldo as $ds) : ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?= $ds->tglsaldomasuk ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?= rupiah($ds->saldomasuk) ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach ($jumif as $ju) : ?>
                                    <?php if ($ju->status == 1) { ?>
                                        <form action="<?= base_url('kadin/acc_laporan/') ?>" method="post" enctype="multipart/form-data">

                                            <?php foreach ($idsaldo as $ds) : ?>
                                                <input type="hidden" name="id_saldo" value="<?= $ds->id_saldo ?>">
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
                                                    <?php if ($lap->carapembayaran == 'Tunai') { ?>
                                                        <td><?= rupiah($lap->jumlah) ?></td>
                                                        <td><?= rupiah(0) ?></td>
                                                    <?php } elseif ($lap->carapembayaran == 'Non-Tunai') { ?>
                                                        <td><?= rupiah(0) ?></td>
                                                        <td><?= rupiah($lap->jumlah) ?></td>
                                                    <?php } ?>
                                                    <td></td>
                                                    <td><?= $lap->namatoko ?></td>
                                                    <td><?= $lap->alamattoko ?></td>



                                                    <?php $cekpaj = $this->db->query("SELECT * FROM tb_pajak JOIN tb_transaksi ON tb_pajak.notransaksi = tb_transaksi.notransaksi  WHERE tb_pajak.notransaksi = '$lap->notransaksi' ");
                                                    $lapp = $cekpaj->result();
                                                    if ($cekpaj->num_rows() > 0) { ?>
                                                        <?php foreach ($lapp as $lapp) : ?>
                                                            <td><?= rupiah($lapp->ppn) ?></td>
                                                            <td><?= rupiah($lapp->pph21) ?></td>
                                                            <td><?= rupiah($lapp->pph22) ?></td>
                                                            <td><?= rupiah($lapp->pph23) ?></td>
                                                            <td><?= rupiah($lapp->pphlain) ?></td>
                                                        <?php endforeach; ?>
                                                    <?php } elseif ($cekpaj->num_rows() < 1) { ?>
                                                        <td>Rp. 0,00</td>
                                                        <td>Rp. 0,00</td>
                                                        <td>Rp. 0,00</td>
                                                        <td>Rp. 0,00</td>
                                                        <td>Rp. 0,00</td>

                                                    <?php } ?>
                                                </tr>
                                            <?php endforeach; ?>

                                            <tr>
                                                <td colspan="5" class="text-center">Jumlah</td>
                                                <td>
                                                    <?php foreach ($jumtunai as $jum) :
                                                        echo  rupiah($jum->tunai);
                                                    endforeach;    ?>
                                                </td>
                                                <td><?php foreach ($jumnontunai as $jum) :
                                                        echo  rupiah($jum->nontunai);
                                                    endforeach;    ?></td>
                                                <td><?php foreach ($idsaldo as $jum) :
                                                        echo  rupiah($jum->saldomasuk);
                                                    endforeach;    ?></td>
                                                <td></td>
                                                <td></td>

                                                <td><?php foreach ($jumppn as $jum) :
                                                        echo  rupiah($jum->ppn);
                                                    endforeach;    ?></td>
                                                <td><?php foreach ($jumpph21 as $jum) :
                                                        echo  rupiah($jum->pph21);
                                                    endforeach;    ?></td>
                                                <td><?php foreach ($jumpph22 as $jum) :
                                                        echo  rupiah($jum->pph22);
                                                    endforeach;    ?></td>
                                                <td><?php foreach ($jumpph23 as $jum) :
                                                        echo  rupiah($jum->pph23);
                                                    endforeach;    ?></td>
                                                <td><?php foreach ($jumpphlain as $jum) :
                                                        echo  rupiah($jum->pphlain);
                                                    endforeach;    ?></td>
                                            </tr>

                                            <tr>
                                                <td colspan="5" class="text-center"> Saldo/disetor Bendahara pengeluaran</td>
                                                <td><?php foreach ($jumsisa as $jum) :
                                                        echo  rupiah($jum->jumsis);
                                                    endforeach;    ?></td>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
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
                                            <td> Bendahara Pengeluaran Belanja Langsung </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp; </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="btn-sm btn-primary text-center">Ter-ACC</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp; </td>
                                        </tr>

                                        <?php foreach ($bendahara as $ben) : ?>
                                            <tr>
                                                <td><?= $ben->namalengkap ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIP. <?= $ben->nip ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Kudus, <?= date('d-m-Y') ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Kepala Dinas</td>
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

                                        <?php foreach ($kadin as $pem) : ?>
                                            <tr>
                                                <td><?= $pem->namalengkap ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIP. <?= $pem->nip ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                </form>
                            <?php } elseif ($ju->status == 2) { ?>
                                <form action="<?= base_url('kadin/un_acc/') ?>" method="post" enctype="multipart/form-data">

                                    <?php foreach ($idsaldo as $ds) : ?>
                                        <input type="hidden" name="id_saldo" value="<?= $ds->id_saldo ?>">
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
                                            <?php if ($lap->carapembayaran == 'Tunai') { ?>
                                                <td><?= rupiah($lap->jumlah) ?></td>
                                                <td><?= rupiah(0) ?></td>
                                            <?php } elseif ($lap->carapembayaran == 'Non-Tunai') { ?>
                                                <td><?= rupiah(0) ?></td>
                                                <td><?= rupiah($lap->jumlah) ?></td>
                                            <?php } ?>
                                            <td></td>
                                            <td><?= $lap->namatoko ?></td>
                                            <td><?= $lap->alamattoko ?></td>

                                            <?php $cekpaj = $this->db->query("SELECT * FROM tb_pajak JOIN tb_transaksi ON tb_pajak.notransaksi = tb_transaksi.notransaksi  WHERE tb_pajak.notransaksi = '$lap->notransaksi' ");
                                            $lapp = $cekpaj->result();
                                            if ($cekpaj->num_rows() > 0) { ?>
                                                <?php foreach ($lapp as $lapp) : ?>
                                                    <td><?= rupiah($lapp->ppn) ?></td>
                                                    <td><?= rupiah($lapp->pph21) ?></td>
                                                    <td><?= rupiah($lapp->pph22) ?></td>
                                                    <td><?= rupiah($lapp->pph23) ?></td>
                                                    <td><?= rupiah($lapp->pphlain) ?></td>
                                                <?php endforeach; ?>
                                            <?php } elseif ($cekpaj->num_rows() < 1) { ?>
                                                <td>Rp. 0,00</td>
                                                <td>Rp. 0,00</td>
                                                <td>Rp. 0,00</td>
                                                <td>Rp. 0,00</td>
                                                <td>Rp. 0,00</td>

                                            <?php } ?>
                                        </tr>
                                    <?php endforeach; ?>

                                    <tr>
                                        <td colspan="5" class="text-center">Jumlah</td>
                                        <td>
                                            <?php foreach ($jumtunai as $jum) :
                                                echo  rupiah($jum->tunai);
                                            endforeach;    ?>
                                        </td>
                                        <td><?php foreach ($jumnontunai as $jum) :
                                                echo  rupiah($jum->nontunai);
                                            endforeach;    ?></td>
                                        <td><?php foreach ($idsaldo as $jum) :
                                                echo  rupiah($jum->saldomasuk);
                                            endforeach;    ?></td>
                                        <td></td>
                                        <td></td>

                                        <td><?php foreach ($jumppn as $jum) :
                                                echo  rupiah($jum->ppn);
                                            endforeach;    ?></td>
                                        <td><?php foreach ($jumpph21 as $jum) :
                                                echo  rupiah($jum->pph21);
                                            endforeach;    ?></td>
                                        <td><?php foreach ($jumpph22 as $jum) :
                                                echo  rupiah($jum->pph22);
                                            endforeach;    ?></td>
                                        <td><?php foreach ($jumpph23 as $jum) :
                                                echo  rupiah($jum->pph23);
                                            endforeach;    ?></td>
                                        <td><?php foreach ($jumpphlain as $jum) :
                                                echo  rupiah($jum->pphlain);
                                            endforeach;    ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-center"> Saldo/disetor Bendahara pengeluaran</td>
                                        <td><?php foreach ($jumsisa as $jum) :
                                                echo  rupiah($jum->jumsis);
                                            endforeach;    ?></td>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
                                                        <td>Bendahara Pengeluaran Belanja Langsung</td>
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

                                                    <?php foreach ($bendahara as $ben) : ?>
                                                        <tr>
                                                            <td><?= $ben->namalengkap ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>NIP. <?= $ben->nip ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col-sm-4">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>Kudus, <?= date('d-m-Y') ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kepala Dinas</td>
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

                                                    <?php foreach ($kadin as $pem) : ?>
                                                        <tr>
                                                            <td><?= $pem->namalengkap ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>NIP. <?= $pem->nip ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
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