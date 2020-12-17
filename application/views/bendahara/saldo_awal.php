<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>


        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Input Data Saldo</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" action="<?= base_url('bendahara/tambah_saldoawal') ?>" method="POST" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_saldo">Id saldo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="id_saldo" name="id_saldo" value="<?= date('Ymdi') ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="periodebulan">Periode bulan <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" id="periodebulan" name="periodebulan">
                                        <?php foreach ($bulan as $bul) : ?>
                                            <?php if ($bul == date('m')) : ?>
                                                <option value="<?= $bul ?>" selected>
                                                    <?php
                                                    if ($bul == '01') {
                                                        echo  'Januari';
                                                    } elseif ($bul == '02') {
                                                        echo  'Februari';
                                                    } elseif ($bul == '03') {
                                                        echo  'Maret';
                                                    } elseif ($bul == '04') {
                                                        echo  'April';
                                                    } elseif ($bul == '05') {
                                                        echo  'Mei';
                                                    } elseif ($bul == '06') {
                                                        echo  'Juni';
                                                    } elseif ($bul == '07') {
                                                        echo  'Juli';
                                                    } elseif ($bul == '08') {
                                                        echo  'Agustus';
                                                    } elseif ($bul == '09') {
                                                        echo  'September';
                                                    } elseif ($bul == '10') {
                                                        echo  'Oktober';
                                                    } elseif ($bul == '11') {
                                                        echo  'November';
                                                    } elseif ($bul == '12') {
                                                        echo  'Desember';
                                                    }
                                                    ?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?= $bul ?>">
                                                    <?php
                                                    if ($bul == '01') {
                                                        echo  'Januari';
                                                    } elseif ($bul == '02') {
                                                        echo  'Februari';
                                                    } elseif ($bul == '03') {
                                                        echo  'Maret';
                                                    } elseif ($bul == '04') {
                                                        echo  'April';
                                                    } elseif ($bul == '05') {
                                                        echo  'Mei';
                                                    } elseif ($bul == '06') {
                                                        echo  'Juni';
                                                    } elseif ($bul == '07') {
                                                        echo  'Juli';
                                                    } elseif ($bul == '08') {
                                                        echo  'Agustus';
                                                    } elseif ($bul == '09') {
                                                        echo  'September';
                                                    } elseif ($bul == '10') {
                                                        echo  'Oktober';
                                                    } elseif ($bul == '11') {
                                                        echo  'November';
                                                    } elseif ($bul == '12') {
                                                        echo  'Desember';
                                                    }
                                                    ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>

                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Periode tahun <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="periodetahun" name="periodetahun" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div> -->
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="periodebulan">Periode Bulan <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="periodebulan" name="periodebulan" value="<?= date('m'); ?>" required="required" class="form-control" disabled>
                                </div>
                            </div> -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="periodetahun">Periode tahun <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="periodetahun" name="periodetahun" value="<?= date('Y'); ?>" required="true" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal saldo masuk <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="tglsaldomasuk" name="tglsaldomasuk" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" value="<?= date('Y-m-d') ?>" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="saldomasuk">Saldo Masuk <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="saldomasuk1" name="saldomasuk" required="true" class="form-control">
                                </div>

                            </div> -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="saldomasuk">Saldo Masuk <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 ">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" id="saldomasuk1" name="saldomasuk" class="form-control">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group d-none">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal saldo sisa <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="tglsaldosisa" name="tglsaldosisa" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="true" value="<?= date('Y-m-d') ?>" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="item form-group d-none">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="jumlahsaldosisa">Jumlah saldo sisa sebelumnya<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <?php
                                    $saldo = $this->db->query(" SELECT jumlahsaldosisa FROM tb_saldoawal ORDER BY tglsaldosisa DESC")->num_rows();
                                    if ($saldo < 1) {
                                    ?>
                                        <input type="number" id="jumlahsaldosisa" name="jumlahsaldosisa" value="0" required="true" class="form-control" readonly>

                                    <?php

                                    } elseif ($saldo > 0) {
                                        $saldolama = $this->db->query(" SELECT jumlahsaldosisa FROM tb_saldoawal ORDER BY tglsaldosisa DESC");
                                        $row = $saldolama->row();
                                        $li = $row->jumlahsaldosisa; ?>
                                        <input type="number" id="jumlahsaldosisa" name="jumlahsaldosisa" value="<?= $li ?>" required="true" class="form-control" readonly>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="<?= base_url('bendahara/data_saldo_awal') ?>" class="btn btn-primary" type="button">Cancel</a>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>