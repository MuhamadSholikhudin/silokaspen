<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Input Edit Data Pajak</small></h2>
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="notransaksi">Nomer Transaksi<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="notransaksi" name="notransaksi" required="required" value="<?= $paj->notransaksi ?>" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_saldo">Id Saldo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">

                                        <input type="text" id="id_saldo" required="required" name="id_saldo" value="<?= $paj->id_saldo ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idusername">ID Username <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="hidden" name="idusername" value="<?= $this->session->userdata('idusername') ?>" required="required" class="form-control" readonly>
                                        <input type="text" id="idusername" value="<?= $this->session->userdata('username') ?>" required="required" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="item form-group d-none">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="jumlah">Jumlah <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="jumlah" name="jumlahlama" value="<?= $paj->jumlah ?>" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="notransaksi">Nominal Transaksi<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <?php
                                        $transakjum = $this->db->query(" SELECT jumlah FROM tb_transaksi WHERE notransaksi = '$paj->notransaksi' AND status < 1 ");
                                        $klx = $transakjum->row();
                                        $ji = $klx->jumlah;
                                        ?>
                                        <input type="text" id="nominaltransaksi" required="required" value="<?= $ji ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_saldo">Saldo Sisa <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 d-none">
                                        <?php
                                        $saldolama = $this->db->query(" SELECT id_saldo, jumlahsaldosisa FROM tb_saldoawal WHERE status < 1 ORDER BY tglsaldosisa DESC");
                                        $row = $saldolama->row();
                                        $si = $row->id_saldo;
                                        $so = $row->jumlahsaldosisa;
                                        ?>
                                        <input type="number" id="jumlahsaldosisa" required="required" name="sisa" value="<?= $so ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" required="required" value="<?= $so ?>" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="ppn">PPN <span class="required">*</span>
                                    </label>
                                    <div class="col-md-5 col-sm-5 ">
                                        <input type="number" id="ppn" name="ppn" Min="0" value="<?= $paj->ppn ?>" required="required" class="form-control">
                                    </div>
                                    <div class="col-md-1 col-sm-1 ">
                                        <?php if ($paj->ppn > 0) { ?>
                                            <input type="checkbox" name="" id="pilihppn" class="form-control" checked>
                                        <?php } elseif ($paj->ppn == 0) { ?>
                                            <input type="checkbox" name="" id="pilihppn" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pph21">PPh21 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="number" id="pph21" name="pph21" Min="0" value="<?= $paj->pph21 ?>" required="required" class="form-control">
                                    </div>
                                    <div class="col-md-1 col-sm-1 ">
                                        <?php if ($paj->pph21 > 0) { ?>
                                            <input type="checkbox" name="" id="pilihpph21" class="form-control" checked>
                                        <?php } elseif ($paj->pph21 == 0) { ?>
                                            <input type="checkbox" name="" id="pilihpph21" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pph22">PPH22 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="number" id="pph22" Min="0" name="pph22" Min="0" value="<?= $paj->pph22 ?>" required="required" class="form-control">
                                    </div>
                                    <div class="col-md-1 col-sm-1">
                                        <?php if ($paj->pph22 > 0) { ?>
                                            <input type="checkbox" name="" id="pilihpph22" class="form-control" checked>
                                        <?php } elseif ($paj->pph22 == 0) { ?>
                                            <input type="checkbox" name="" id="pilihpph22" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pph23">PP23 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="number" id="pph23" name="pph23" Min="0" value="<?= $paj->pph23 ?>" required="required" class="form-control">
                                    </div>
                                    <div class="col-md-1 col-sm-1">
                                        <?php if ($paj->pph23 > 0) { ?>
                                            <input type="checkbox" name="" id="pilihpph23" class="form-control" checked>
                                        <?php } elseif ($paj->pph23 == 0) { ?>
                                            <input type="checkbox" name="" id="pilihpph23" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pphlain">PPH lain lain<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" id="pphlain" name="pphlain" Min="0" value="<?= $paj->pphlain ?>" required="required" class="form-control">
                                    </div>

                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="img">Gambar lama<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="image view view-first">
                                            <img style="width: 100%; height:100%;" src="<?= base_url('uploads/') . $paj->gambar ?>" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class=" item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Ubah Gambar<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" id="gambar" name="gambar" value="<?= $paj->gambar ?>" required="required" class="form-control">
                                    </div>
                                </div>
                            <?php endforeach; ?>




                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a class="btn btn-primary" href="<?= base_url('pembantu/data_pajak') ?>">Cancel</a>
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