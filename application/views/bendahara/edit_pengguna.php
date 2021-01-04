<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Edit Pengguna</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" action="<?= base_url('bendahara/edit_tb_user_aksi') ?>" method="POST" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                            <?php foreach ($user as $jns) : ?>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="username" name="username" value="<?= $jns->username ?>" required="required" class="form-control ">
                                        <input type="hidden" id="idusername" name="idusername" value="<?= $jns->idusername ?>" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="password" id="password" name="password" value="<?= $jns->password ?>" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nip">NIP <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="nip" name="nip" value="<?= $jns->nip ?>" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="namalengkap">Nama Lengkap <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="namalengkap" name="namalengkap" value="<?= $jns->namalengkap ?>" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="telepon">Telepon <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="telepon" name="telepon" value="<?= $jns->telepon ?>" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="hakakses">Hak Akses<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="hakakses" name="hakakses">
                                            <?php foreach ($hakakses as $car) : ?>
                                                <?php if ($car == $jns->hakakses) : ?>
                                                    <option value="<?= $car ?>" selected> <?= $car ?> </option>
                                                <?php else : ?>
                                                    <option value="<?= $car ?>"> <?= $car ?> </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status Pengguna<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="status" name="status">
                                            <?php foreach ($status as $car) : ?>
                                                <?php if ($car == $jns->status) : ?>
                                                    <option value="<?= $car ?>" selected> <?= $car ?> </option>
                                                <?php else : ?>
                                                    <option value="<?= $car ?>"> <?= $car ?> </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                            <?php endforeach; ?>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a class="btn btn-primary" href="<?= base_url('bendahara/pengguna') ?>">Cancel</a>
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