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
                            <h2> Data Transaksi</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">

                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <?php
                                    foreach ($transaksi as $tran) : ?>
                                        <table border="1" class="table table-bordered">


                                            <tbody>
                                                <tr>
                                                    <td>Nomer Transaksi</td>
                                                    <td><?= $tran->notransaksi ?></td>
                                                </tr>
                                                <tr>

                                                    <td>Kode Rekening</td>
                                                    <td><?= $tran->kode_rekening ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal transaksi</td>
                                                    <td><?= $tran->tgltransaksi ?></td>

                                                </tr>

                                                <tr>
                                                    <td>Id Saldo</td>
                                                    <td><?= $tran->id_saldo ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Id Jenis Pengeluaran</td>
                                                    <td><?= $tran->kdjnspengeluaran ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Uraian</td>
                                                    <td>
                                                        <?php $urai = $this->db->query("SELECT * FROM tb_jnspengeluaran WHERE kdjnspengeluaran = '$tran->kdjnspengeluaran'");
                                                        $ura = $urai->row();
                                                        echo $ura->uraian;
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    <td><?= rupiah($tran->jumlah) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Gambar</td>

                                                    <td> <img style="width: 200px; height:200px;" src="<?= base_url('uploads/') . $tran->gambar ?>" alt="image"></td>
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