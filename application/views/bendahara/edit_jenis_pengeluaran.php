<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Edit Jenis Pengeluaran</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" action="<?= base_url('bendahara/edit_jnspengeluaran_aksi') ?>" method="POST" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                            <?php foreach ($jnspengeluaran as $jns) : ?>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kdjndpengeluaran">Id Jenis Pengeluaran <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="kdjndpengeluaran" name="kdjnspengeluaran" value="<?= $jns->kdjnspengeluaran ?>" required="required" class="form-control ">
                                        <input type="hidden" id="kdjnspengeluaranlama" name="kdjnspengeluaranlama" value="<?= $jns->kdjnspengeluaran ?>" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kode_rekening">Kode rekening <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea type="text" id="kode_rekening" name="kode_rekening" required="kode_rekening" class="form-control"><?= $jns->kode_rekening ?></textarea>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="uraian">Uraian <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea type="text" id="uraian" name="uraian" required="required" class="form-control"><?= $jns->uraian ?></textarea>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a class="btn btn-primary" href="<?= base_url('bendahara/data_jenis_pengeluaran') ?>">Cancel</a>
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