<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Input <small>Data Pajak</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" action="<?= base_url('pembantu/edit_pajak_aksi') ?>" method="POST" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                            <?php foreach ($pajak as $paj) : ?>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nodok">Nomer Dokumen<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="nodok" name="nodok" value="<?= $paj->nodok ?>" required="required" class="form-control ">
                                        <input type="hidden" id="nodoklama" name="nodoklama" value="<?= $paj->nodok ?>" required="required" class="form-control ">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Dokumen <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="tgldok" class="date-picker form-control" name="tgldok" value="<?= $paj->tgldok ?>" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idusername">ID Username <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="idusername" name="idusername" value="<?= $this->session->userdata('username') ?>" required="required" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="jumlah">Jumlah <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="jumlah" name="jumlahlama" value="<?= $paj->jumlah ?>" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kdsaldo">Kode Saldo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="kdsaldo" name="kdsaldo">
                                            <?php foreach ($kdsaldo as $kd) : ?>
                                                <?php if ($kd->kdsaldo == $paj->kdsaldo) : ?>
                                                    <option value="<?= $kd->kdsaldo ?>" selected> <?= $kd->kdsaldo ?> </option>
                                                <?php else : ?>
                                                    <option value="<?= $kd->kdsaldo ?>"> <?= $kd->kdsaldo ?> </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="sal">Saldo Sisa <span class="required">*</span>
                                    </label>
                                    <?php $jumsisa = $this->db->query("SELECT jumlahsaldosisa FROM tb_saldoawal WHERE kdsaldo = $paj->kdsaldo ")->result(); ?>
                                    <div class="col-md-6 col-sm-6 ">
                                        <?php foreach ($jumsisa as $sis) : ?>
                                            <input type="number" id="sal" name="sisa" value="<?= $sis->jumlahsaldosisa ?>" required="required" class="form-control" readonly>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="ppn">PPN <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="ppn" name="ppn" value="<?= $paj->ppn ?>" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pph21">PPh21 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="pph21" name="pph21" value="<?= $paj->pph21 ?>" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pph22">PPH22 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="pph22" name="pph22" value="<?= $paj->pph22 ?>" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pph23">PP23 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="pph23" name="pph23" value="<?= $paj->pph23 ?>" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pphlain">PPH lain lain<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="pphlain" name="pphlain" value="<?= $paj->pphlain ?>" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="img">Gambar<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        
                                        <img src="<?= base_url('uploads/') . $paj->gambar ?> alt=" <?= $paj->gambar ?>" >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Gambar<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" id="gambar" name="gambar" required="required" class="form-control">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a class="btn btn-primary" href="<?= base_url('pembantu/data_pajak') ?>">Cancel</a>
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