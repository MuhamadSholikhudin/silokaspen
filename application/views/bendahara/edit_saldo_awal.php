<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>


        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Design <small>different form elements</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" action="<?= base_url('bendahara/edit_saldoawal_aksi') ?>" method="POST" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                            <?php foreach ($saldo as $sal) : ?>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kdsaldo">Kode saldo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="kdsaldo" name="kdsaldo" value="<?= $sal->kdsaldo ?>" class="form-control" required>
                                        <input type="hidden" id="kdsaldolama" name="kdsaldolama" value="<?= $sal->kdsaldo ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal saldo masuk <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="tglsaldomasuk" name="tglsaldomasuk" value="<?= $sal->tglsaldomasuk ?>" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="periodebulan">Periode bulan <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="periodebulan" name="periodebulan">
                                            <?php foreach ($bulan as $bul) : ?>
                                                <?php if ($bul == $sal->periodebulan) : ?>
                                                    <option value="<?= $bul ?>"><?= $bul ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $bul ?>"><?= $bul ?></option>

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
                                    <input type="text" id="periodebulan" name="periodebulan" value="" required="required" class="form-control" disabled>
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="saldomasuk">Saldo Masuk <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="saldomasuk" name="saldomasuk" value="<?= $sal->saldomasuk ?>" required="true" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal saldo sisa <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="tglsaldosisa" name="tglsaldosisa" value="<?= $sal->tglsaldosisa ?>" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="jumlahsaldosisa">Jumlah Saldo Sisa <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="jumlahsaldosisa" name="jumlahsaldosisa" value="<?= $sal->jumlahsaldosisa ?>" required="required" class="form-control">
                                    </div>
                                </div>

                            <?php endforeach; ?>


                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a class="btn btn-primary" href="<?= base_url('bendahara/data_saldo_awal') ?>">Cancel</a>
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>