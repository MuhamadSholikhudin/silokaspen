<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="<?= base_url('assets/'); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css" media="print">
        @page {
            size: landscape;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="col-lg-12">
            <h6 class="text-center mt-3">DATA/BUKTI PENGELUARAN</h6>
            <h6 class="text-center">KEGIATAN BELANJA BARANG DAN JASA</h6>
            <h6 class="text-center">PENERIMAAN UP (UANG PANJAR) BULAN DESEMBER 2019 TAHAP II</h6>
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
                            <td><?= $ds->saldomasuk ?></td>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>

                    <form action="<?= base_url('bendahara/ajukan_laporan_bku/') ?>" method="post">

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
                            <td></td>
                            <td></td>

                            <td><?php foreach ($jumppn as $jum) :
                                    echo  $jum->ppn;
                                endforeach;    ?></td>
                            <td><?php foreach ($jumpph21 as $jum) :
                                    echo  $jum->pph21;
                                endforeach;    ?></td>
                            <td><?php foreach ($jumpph22 as $jum) :
                                    echo  $jum->pph22;
                                endforeach;    ?></td>
                            <td><?php foreach ($jumpph23 as $jum) :
                                    echo  $jum->pph23;
                                endforeach;    ?></td>
                            <td><?php foreach ($jumpphlain as $jum) :
                                    echo  $jum->pphlain;
                                endforeach;    ?></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-center"> Saldo/disetor Bendahara pengeluaran</td>
                            <td><?php foreach ($jumsisa as $jum) :
                                    echo  $jum->jumsis;
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
                                <td>Pejabat Pelaksana teknis </td>
                            </tr>
                            <tr>
                                <td>&nbsp; </td>
                            </tr>
                            <tr>
                                <td>&nbsp; </td>
                            </tr>
                            <tr>
                                <td>&nbsp; </td>
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
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp; </td>
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
                </div>
            </div>


            <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
            <script>
                window.print()
            </script>
</body>

</html>