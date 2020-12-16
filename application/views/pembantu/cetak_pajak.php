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
    <?php
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
    ?>
    <div class="center_col" role="main" style="min-height: 4546px;">
        <div class>


            <div class="clearfix"></div>

            <div class="row">


                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title text-center">
                            <h2> Data Pajak</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">

                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <?php foreach ($pajak as $paj) : ?>
                                        <table border="1" class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>Nomer Dokumen</td>
                                                    <td><?= $paj->nodok ?></td>
                                                </tr>
                                                <tr>

                                                    <td>Tanggal Dokumen</td>
                                                    <td><?= $paj->tgldok ?></td>
                                                </tr>
                                                <tr>

                                                    <td>Nomer Transaksi</td>
                                                    <td><?= $paj->notransaksi ?></td>
                                                </tr>
                                                <td>Nominal Transaksi</td>
                                                <td>
                                                    <?php $urai = $this->db->query("SELECT jumlah FROM tb_transaksi WHERE notransaksi = '$paj->notransaksi'");
                                                    $ura = $urai->row();
                                                    echo rupiah($ura->jumlah);
                                                    ?>
                                                </td>
                                                </tr>
                                                <td>Id Pengeluaran / Uraian</td>
                                                <td>
                                                    <?php
                                                    $ur = $this->db->query(" SELECT tb_jnspengeluaran.kdjnspengeluaran as kdjns, tb_jnspengeluaran.uraian as uraian FROM tb_jnspengeluaran JOIN tb_transaksi ON tb_jnspengeluaran.kdjnspengeluaran = tb_transaksi.kdjnspengeluaran  WHERE tb_transaksi.notransaksi = '$paj->notransaksi' ");
                                                    $klx = $ur->row();
                                                    $urir = $klx->uraian;
                                                    $kdj = $klx->kdjns;

                                                    ?>
                                                    <?= $kdj." / ". $urir ?>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>Id Saldo</td>
                                                    <td><?= $paj->id_saldo ?></td>
                                                </tr>

                                                <tr>
                                                    <td>PPN</td>
                                                    <td><?= rupiah($paj->ppn) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>PPH 21</td>
                                                    <td><?= rupiah($paj->pph21) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>PPH 22</td>
                                                    <td><?= rupiah($paj->pph22) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>PPH 23</td>

                                                    <td><?= rupiah($paj->pph23) ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>PPH LAIN</td>
                                                    <td><?= rupiah($paj->pphlain) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>GAMBAR</td>

                                                    <td> <img style="width: 200px; height:200px;" src="<?= base_url('uploads/') . $paj->gambar ?>" alt="image"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php endforeach; ?>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>


                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>

    <script>
        window.print()
    </script>
</body>

</html>