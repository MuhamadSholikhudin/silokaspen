<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORAN DATA SALDO MASUK</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body>
    <div style="padding-left: 50px; padding-right: 50px;">

        <h3 class="mt-4" style="text-align: center;">
            LAPORAN DATA SALDO MASUK BELANJAN PENGELUARAN <br>
            DINAS PENDIDIKAN, PEMUDA DAN OLAHRAGA PADA <br>
            PERIODE TANGGAL AWAL SAMPAI TANGGAL AKHIR <br>
        </h3>

        <p>
            <h4>Unit Kerja : Dinas Pendidikan, Pemuda dan Olahraga </h4>
        </p>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Saldo</th>
                    <th>Tanggal Saldo Masuk</th>
                    <th>Periode Bulan</th>
                    <th>Periode Tahun</th>
                    <th>Jumlah Saldo Masuk</th>
                    <th>Tanggal Saldo Sisa</th>
                    <th>Jumlah Saldo Sisa</th>

                    <!-- <th>Status</th> -->
                </tr>
            </thead>
            <tbody>


                <?php $no = 1; ?>
                <?php foreach ($laporan_saldo as $lapsal) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $lapsal->tglsaldomasuk ?></td>
                        <td><?= $lapsal->id_saldo ?></td>
                        <td>
                            <?php

                            if ($lapsal->periodebulan == '01') {
                                echo  'Januari';
                            } elseif ($lapsal->periodebulan == '02') {
                                echo  'Februari';
                            } elseif ($lapsal->periodebulan == '03') {
                                echo  'Maret';
                            } elseif ($lapsal->periodebulan == '04') {
                                echo  'April';
                            } elseif ($lapsal->periodebulan == '05') {
                                echo  'Mei';
                            } elseif ($lapsal->periodebulan == '06') {
                                echo  'Juni';
                            } elseif ($lapsal->periodebulan == '07') {
                                echo  'Juli';
                            } elseif ($lapsal->periodebulan == '08') {
                                echo  'Agustus';
                            } elseif ($lapsal->periodebulan == '09') {
                                echo  'September';
                            } elseif ($lapsal->periodebulan == '10') {
                                echo  'Oktober';
                            } elseif ($lapsal->periodebulan == '11') {
                                echo  'November';
                            } elseif ($lapsal->periodebulan == '12') {
                                echo  'Desember';
                            }
                            ?>

                        </td>
                        <td><?= $lapsal->periodetahun ?></td>
                        <td><?= $lapsal->saldomasuk ?></td>
                        <td><?= $lapsal->tglsaldosisa ?></td>
                        <td><?= $lapsal->jumlahsaldosisa ?></td>


                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

        <div class="row">

            <div class="col-sm-9">

            </div>
            <div class="col-sm-3">
                <h5>Kudus, <?= date('d-m-Y') ?></h5>
                <h5>Kepala Dinas</h5>
                <h5>Disdikpora Kudus</h5>
                <br>
                <br>
                <br>
                <?php foreach ($kadin as $ka) : ?>
                    <h5><?= $ka->namalengkap ?></h5>
                    <h5>NIP. <?= $ka->nip ?></h5>

                <?php endforeach; ?>
                <h5></h5>

            </div>


        </div>

    </div>

    <?php if ($this->session->userdata('hahkakses') == 'bendahara') { ?>
        <script>
            window.open('<?= base_url('bendahara/laporan_saldo') ?>', '_blank');
        </script>
    <?php } elseif ($this->session->userdata('hahkakses') == 'kadin') { ?>
        <script>
            window.open('<?= base_url('bendahara/laporan_saldo') ?>', '_blank');
        </script>
    <?php } ?>
    <script>
        window.print()
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>