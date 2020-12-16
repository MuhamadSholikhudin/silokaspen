<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Edit Data Transaksi</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" action="<?= base_url('pembantu/edit_transaksi_aksi') ?>" method="POST" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                            <?php foreach ($transaksi as $tran) : ?>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="notransaksi">Nomer Transaksi <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="notransaksi" required="required" name="notransaksi" value="<?= $tran->notransaksi ?>" class="form-control ">
                                        <input type="hidden" id="notransaksilama" required="required" name="notransaksilama" value="<?= $tran->notransaksi ?>" class="form-control ">
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal transaksi <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="tgltransaksi" class="date-picker form-control" name="tgltransaksi" value="<?= $tran->tgltransaksi ?>" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_saldo">Id Saldo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="id_saldo" required="required" name="id_saldo" value="<?= $tran->id_saldo ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="item form-group d-none">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idusername">Id Username <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="id_saldo" name="idusername" value="<?= $tran->idusername ?>" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idusername">Saldo Sisa <span class="required">*</span>
                                    </label>
                                    <?php $jumsisa = $this->db->query("SELECT jumlahsaldosisa FROM tb_saldoawal WHERE id_saldo = $tran->id_saldo ")->result(); ?>

                                    <div class="col-md-6 col-sm-6 ">
                                        <?php foreach ($jumsisa as $sis) : ?>
                                            <input type="text" id="id_saldo" name="sisa" value="<?= $sis->jumlahsaldosisa ?>" required="required" class="form-control" readonly>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <!-- <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_saldo">Kode Saldo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" name="id_saldo">
                                            <?php foreach ($id_saldo as $kd) : ?>
                                                <?php if ($kd->id_saldo == $tran->id_saldo) : ?>
                                                    <option value="<?= $kd->id_saldo ?>" selected> <?= $kd->id_saldo ?> </option>
                                                <?php else : ?>
                                                    <option value="<?= $kd->id_saldo ?>"> <?= $kd->id_saldo ?> </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kdjnspengeluaran">Id Jenis Pengeluaran <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="kdjnspengeluaran" name="kdjnspengeluaran">
                                            <?php foreach ($kdjnspengeluaran as $kdjns) : ?>
                                                <?php if ($kdjns->kdjnspengeluaran == $tran->kdjnspengeluaran) : ?>
                                                    <option value="<?= $kdjns->kdjnspengeluaran ?>" selected> <?= $kdjns->kdjnspengeluaran ?> / <?= $kdjns->uraian ?> </option>
                                                <?php else : ?>
                                                    <option value="<?= $kdjns->kdjnspengeluaran ?>"> <?= $kdjns->kdjnspengeluaran ?> / <?= $kdjns->uraian ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="carapembayaran">Cara pembayaran <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="carapembayaran" name="carapembayaran">
                                            <option value="Non-Tunai">Non-Tunai</option>
                                            <option value="Tunai"> Tunai</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="jumlah">Jumlah <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="hidden" id="jumlah" min="0" name="jumlahlama" value="<?= $tran->jumlah ?>" required="required" class="form-control">
                                        <input type="text" id="jumlah" min="0" name="jumlahbaru" value="<?= $tran->jumlah ?>" required="required" class="form-control">
                                    </div>
                                </div>
<!-- 
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="saldomasuk">Saldo Masuk <span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6 ">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" id="jumlah1" name="saldomasuk" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">,00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kode_rekening">Kode Rekening <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="kode_rekening" required="required" name="kode_rekening" value="<?= $tran->kode_rekening ?>" class="form-control ">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="namatoko">Nama Toko<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="namatoko" name="namatoko" value="<?= $tran->namatoko ?>" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamattoko">Alamat Toko <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="alamattoko" name="alamattoko" value="<?= $tran->alamattoko ?>" required="required" class="form-control">


                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="img">Gambar lama<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="image view view-first">
                                            <img style="width: 100%; height:100%;" src="<?= base_url('uploads/') . $tran->gambar ?>" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Ubah Gambar<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" id="gambar" name="gambar" value="<?= $tran->gambar ?>" required="required" class="form-control">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a class="btn btn-primary" href="<?= base_url('pembantu/data_transaksi') ?>">Cancel</a>
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </div>
                                <a class="btn btn-warning text-right" href="<?= base_url('pembantu/cetak_transaksi') ?>"> <i class="fa fa-print"></i> Cetak</a>

                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>