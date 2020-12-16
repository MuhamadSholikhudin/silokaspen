<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
      

        <div class="clearfix"></div>

        <div class="bg-white p-3">
            <h3 class="text-center">Data Saldo </h3>
            <a href="<?= base_url('bendahara/saldo_awal') ?>" class="btn btn-primary">Tambah Saldo</a>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12" border="1">
                    <table id="example" class="display text-dark" border="1" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Saldo</th>
                                <th>Tgl saldo Masuk</th>
                                <th>Saldo Masuk</th>
                                <th>Periode Bulan</th>
                                <th>Periode tahun</th>
                                <!-- <th>Tgl Saldo Sisa</th> -->
                                <!-- <th>Jumlah Saldo Sisa</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($saldo as $sal) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><a href="<?= base_url('bendahara/edit_saldo_awal/') . $sal->id_saldo ?>"><?= $sal->id_saldo ?></a></td>
                                    <td><?= $sal->tglsaldomasuk ?></td>
                                    <td><?= rupiah($sal->saldomasuk) ?></td>
                                    <td><?php

                                        if ($sal->periodebulan == '01') {
                                            echo  'Januari';
                                        } elseif ($sal->periodebulan == '02') {
                                            echo  'Februari';
                                        } elseif ($sal->periodebulan == '03') {
                                            echo  'Maret';
                                        } elseif ($sal->periodebulan == '04') {
                                            echo  'April';
                                        } elseif ($sal->periodebulan == '05') {
                                            echo  'Mei';
                                        } elseif ($sal->periodebulan == '06') {
                                            echo  'Juni';
                                        } elseif ($sal->periodebulan == '07') {
                                            echo  'Juli';
                                        } elseif ($sal->periodebulan == '08') {
                                            echo  'Agustus';
                                        } elseif ($sal->periodebulan == '09') {
                                            echo  'September';
                                        } elseif ($sal->periodebulan == '10') {
                                            echo  'Oktober';
                                        } elseif ($sal->periodebulan == '11') {
                                            echo  'November';
                                        } elseif ($sal->periodebulan == '12') {
                                            echo  'Desember';
                                        }
                                        ?></td>
                                    <td><?= $sal->periodetahun ?></td>
                                    <!-- <td> -->
                                        <?php
                                        // $sa = $this->db->query("SELECT jumlahsaldosisa FROM tb_saldoawal WHERE tglsaldomasuk < '$sal->tglsaldomasuk' ORDER BY tglsaldomasuk DESC LIMIT 1")->num_rows();
                                        // if ($sa > 0) {
                                        //     $saldokemarin = $this->db->query("SELECT jumlahsaldosisa FROM tb_saldoawal WHERE tglsaldomasuk < '$sal->tglsaldomasuk' ORDER BY tglsaldomasuk DESC LIMIT 1");
                                        //     $salkem = $saldokemarin->row();
                                        //     echo rupiah($salkem->jumlahsaldosisa);
                                        // } elseif ($sa < 1) {
                                        //     echo rupiah(0);
                                        // }

                                        ?>
                                    <!-- </td> -->
                                    <td>
                                        <a href="<?= base_url('bendahara/edit_saldo_awal/') . $sal->id_saldo ?>" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                                </td>

                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id Saldo</th>
                                <th>Tgl saldo Masuk</th>
                                <th>Saldo Masuk</th>
                                <th>Periode Bulan</th>
                                <th>Periode tahun</th>
                                <!-- <th>Jumlah Saldo Sisa</th> -->
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>