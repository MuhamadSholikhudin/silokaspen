<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
        <div class="page-title">
            <div class="title_left">
                <h3>Laporan Data Saldo </h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Berdasarkan Tanggal</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <?php if ($this->session->userdata('hakakses') == 'kadin') { ?>
                            <form class="form-label-left input_mask" action="<?= base_url('kadin\pilih_tanggal_saldo') ?>" method="POST">
                            <?php } elseif ($this->session->userdata('hakakses') == 'bendahara') { ?>
                                <form class="form-label-left input_mask" action="<?= base_url('bendahara\pilih_tanggal_saldo') ?>" method="POST">
                                <?php } ?>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Tanggal awal<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input class="date-picker form-control" name="tanggal_awal" placeholder="dd-mm-yyyy" type="date" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Tanggal akhir<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input class="date-picker form-control" name="tanggal_akhir" placeholder="dd-mm-yyyy" type="date" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                                </form>
                    </div>
                </div>





            </div>

            <div class="col-md-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Berdasarkan Bulan </h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <?php if ($this->session->userdata('hakakses') == 'kadin') { ?>
                            <form class="form-label-left input_mask" action="<?= base_url('kadin\pilih_bulan_saldo') ?>" method="POST">
                            <?php } elseif ($this->session->userdata('hakakses') == 'bendahara') { ?>
                                <form class="form-label-left input_mask" action="<?= base_url('bendahara\pilih_bulan_saldo') ?>" method="POST">
                                <?php } ?>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Bulan<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select class="form-control" name="bulan">
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 ">Tahun<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <select class="form-control" name="tahun">
                                            <?php $mulai = date('Y') - 20;
                                            for ($i = $mulai; $i < $mulai + 21; $i++) {
                                                $sel = $i == date('Y') ? 'selected="selected"' : '';
                                                echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                                </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="x_panel">
                    <h2>Form berdasarkan Tahun</h2>
                    <div class="x_title">

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>

                        <?php if ($this->session->userdata('hakakses') == 'kadin') { ?>
                            <form class="form-label-left input_mask" action="<?= base_url('kadin\pilih_tahun_saldo') ?>" method="POST">
                            <?php } elseif ($this->session->userdata('hakakses') == 'bendahara') { ?>
                                <form class="form-label-left input_mask" action="<?= base_url('bendahara\pilih_tahun_saldo') ?>" method="POST">
                                <?php } ?>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 ">Tahun<span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control" name="tahun">

                                                <?php $mulai = date('Y') - 20;
                                                for ($i = $mulai; $i < $mulai + 21; $i++) {
                                                    $sel = $i == date('Y') ? 'selected="selected"' : '';
                                                    echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group row">
                                        <div class="col-md-9 col-sm-9  offset-md-3">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                </form>
                    </div>
                </div>





            </div>
        </div>


    </div>
</div>