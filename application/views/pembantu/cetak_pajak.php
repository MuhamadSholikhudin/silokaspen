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
                                        <table border="1" class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Nomer Dokumen</td>
                                                    <td><?= $paj->nodok ?></td>
                                                </tr>
                                                <tr>

                                                    <td>Tanggal Dokumen</td>
                                                    <td><?= $paj->tgldok ?></td>
                                                </tr>

                                                <td>Jumlah</td>
                                                <td>
                                                    <?= $paj->jumlah ?>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Saldo</td>
                                                    <td><?= $paj->kdsaldo ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Saldo sisa</td>
                                                    <td>
                                                        <?php $jumsisa = $this->db->query("SELECT jumlahsaldosisa FROM tb_saldoawal WHERE kdsaldo = $paj->kdsaldo ")->result(); ?>

                                                        <?php foreach ($jumsisa as $sis) : ?>
                                                            <?= $sis->jumlahsaldosisa ?>
                                                        <?php endforeach; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>PPN</td>
                                                    <td><?= $paj->ppn ?></td>
                                                </tr>
                                                <tr>
                                                    <td>PPH 21</td>
                                                    <td><?= $paj->pph21 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>PPH 22</td>
                                                    <td><?= $paj->pph22 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>PPH 23</td>

                                                    <td><?= $paj->pph23 ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>PPH LAIN</td>
                                                    <td><?= $paj->pphlain ?></td>
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