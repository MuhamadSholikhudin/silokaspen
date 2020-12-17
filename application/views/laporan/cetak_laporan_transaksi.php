<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORAN DATA TRANSANSI</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body>
    <div style="padding-left: 50px; padding-right: 50px;">

        <h3 class="mt-4" style="text-align: center;">
            LAPORAN DATA TRANSANSI BELANJAN PENGELUARAN <br>
            DINAS PENDIDIKAN, PEMUDA DAN OLAHRAGA PADA <br>
            PERIODE
            <?php foreach ($inputan1 as $inpt) : ?>
                <?= $inpt ?>
            <?php endforeach; ?>
            SAMPAI
            <?php foreach ($inputan2 as $inpt2) : ?>
                <?= $inpt2 ?>
            <?php endforeach; ?>
            <br>
        </h3>

        <p>
            <h4>Unit Kerja : Dinas Pendidikan, Pemuda dan Olahraga </h4>
        </p>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomer Transaksi</th>
                    <th>tgltransaksi</th>
                    <th>id_saldo</th>
                    <th>id_jnspengeluaran</th>
                    <th>jumlah</th>
                    <th>Nama Toko</th>
                    <th>Alamat Toko</th>
                    <th>Cara Pembayaran</th>
                    <th>Kode Rekening</th>
                </tr>
            </thead>
            <tbody>


                <?php $no = 1; ?>
                <?php foreach ($laporan_transaksi as $laptran) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $laptran->notransaksi ?></td>
                        <td><?= $laptran->tgltransaksi ?></td>
                        <td><?= $laptran->id_saldo ?></td>
                        <td><?= $laptran->kdjnspengeluaran ?></td>
                        <td><?= $laptran->jumlah ?></td>
                        <td><?= $laptran->namatoko ?></td>
                        <td><?= $laptran->alamattoko ?></td>
                        <td><?= $laptran->carapembayaran ?></td>
                        <td><?= $laptran->kode_rekening ?></td>
                       
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
    <script>
        window.print()
    </script>
    <?php if ($this->session->userdata('hahkakses') == 'bendahara') { ?>
        <script>
            window.open('<?= base_url('bendahara/laporan_transaksi') ?>', '_blank');
        </script>
    <?php } elseif ($this->session->userdata('hahkakses') == 'kadin') { ?>
        <script>
            window.open('<?= base_url('bendahara/laporan_transaksi') ?>', '_blank');
        </script>
    <?php } ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>