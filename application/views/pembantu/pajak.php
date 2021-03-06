<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Keterangan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="display: block;">
                        <ul class="to_do">
                            <li>
                                <p>
                                    1. Halaman ini adalah Pengisian pajak untuk transaksi yang telah terjadi
                                </p>
                            </li>
                            <li>
                                <p>
                                    2. Isilah Nomor Dokumen pajak, Nomor Transaksi berdasarkan transaksi yang telah terjadi, Tanggal Pajak, ID Username, Kode Saldo, PPN, PPh21, PPh22, PPh23, PPH lain lain, dan Gambar untuk mengupload bukti pajak
                                </p>
                            </li>
                            <li>
                                <p>
                                    3. Setelah itu klik tambah untuk menambahkan data
                                </p>
                            </li>
                            <li>
                                <p>
                                    4. Klik Cancel untuk membatalkan pengisian data
                                </p>
                            </li>
                            <li>
                                <p>
                                    5. Klik Reset untuk mengosongkan kembali inputan data pajak
                                </p>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Input Data Pajak</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" action="<?= base_url('pembantu/tambah_pajak') ?>" method="POST" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nodok">Nomer Dokumen<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="nodok" name="nodok" value="0" class="form-control" required>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Dokumen <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="tgldok" class="date-picker form-control" name="tgldok" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <?php foreach ($transaksi as $tran) : ?>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="notransaksi">Nomer Transaksi<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">

                                        <input type="text" id="notransaksi" name="notransaksi" required="required" value="<?= $tran->notransaksi ?>" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_saldo">Id Saldo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">

                                        <input type="text" id="id_saldo" required="required" name="id_saldo" value="<?= $tran->id_saldo ?>" class="form-control" readonly>
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

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="notransaksi">Nominal Transaksi<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">

                                        <input type="text"  required="required" value="<?= rupiah($tran->jumlah) ?>" class="form-control" readonly>
                                        <input type="hidden" id="nominaltransaksi" required="required" value="<?= $tran->jumlah ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="notransaksi">Id Pengeluaran / Uraian<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <?php
                                        $ur = $this->db->query(" SELECT kdjnspengeluaran as kdjns, uraian as uraian FROM tb_jnspengeluaran  WHERE kdjnspengeluaran = '$tran->kdjnspengeluaran'  ");
                                        $klx = $ur->row();
                                        $urar = $klx->uraian;
                                        $kdj = $klx->kdjns;
                                        ?>
                                        <input type="text" id="nominaltransaksi" required="required" value="<?= $kdj ?> / <?= $urar ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="item form-group d-none">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_saldo">Saldo Sisa <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <?php
                                        $jumlas = $this->db->query("SELECT jumlahsaldosisa FROM tb_saldoawal WHERE id_saldo = '$tran->id_saldo'  ");
                                        $kli = $jumlas->row();
                                        $jls = $kli->jumlahsaldosisa;;
                                        ?>
                                        <input type="number" id="jumlahsaldosisa" required="required" name="sisa" value="<?= $jls ?>" class="form-control">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="ppn">PPN <span class="required">*</span>
                                </label>
                                <div class="col-md-5 col-sm-5 ">
                                    <input type="number" id="ppn" name="ppn" Min="0" value="0" required="required" class="form-control">
                                </div>
                                <div class="col-md-1 col-sm-1 ">
                                    <input type="checkbox" name="" id="pilihppn" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pph21">PPh21 <span class="required">*</span>
                                </label>
                                <div class="col-md-5 col-sm-5">
                                    <input type="number" id="pph21" name="pph21" Min="0" value="0" required="required" class="form-control">
                                </div>
                                <div class="col-md-1 col-sm-1 ">
                                    <input type="checkbox" name="" id="pilihpph21" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pph22">PPH22 <span class="required">*</span>
                                </label>
                                <div class="col-md-5 col-sm-5">
                                    <input type="number" id="pph22" Min="0" name="pph22" Min="0" value="0" required="required" class="form-control">
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <input type="checkbox" name="" id="pilihpph22" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pph23">PP23 <span class="required">*</span>
                                </label>
                                <div class="col-md-5 col-sm-5">
                                    <input type="number" id="pph23" name="pph23" Min="0" value="0" required="required" class="form-control">
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <input type="checkbox" name="" id="pilihpph23" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pphlain">PPH lain lain<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="pphlain" name="pphlain" Min="0" value="0" required="required" class="form-control">
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Gambar<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="gambar" name="gambar" required="required" class="form-control">
                                </div>
                            </div>
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="idnotransaksi">Nomer Transaksi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" id="idnotransaksi" name="notransaksi">
                                        <option value="">Pilih Nomer Transaksi</option>

                                        <?php foreach ($transaksi as $tran) : ?>
                                            <option value="<?= $tran->notransaksi ?>"><?= $tran->notransaksi ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_saldo">Kode Saldo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" name="id_saldo" id="id_saldo" class="form-control">
                                    <input type="text" name="sisa" id="sisa" class="form-control" readonly>
                                </div>
                            </div> -->
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="jumlah">Jumlah <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="jumlah" name="jumlah" required="required" class="form-control">
                                </div>
                            </div> -->
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kdjnspengeluaran">Kode Jenis Pengeluaran <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" id="kdjnspengeluaran" name="kdjnspengeluaran">
                                        <option>Pilih Kode Pengeluaran</option>
                                        <?php foreach ($kdjnspengeluaran as $kdjns) : ?>
                                            <option value="<?= $kdjns->kdjnspengeluaran ?>"> <?= $kdjns->kdjnspengeluaran ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div> -->
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="<?= base_url('pembantu/pajak') ?>" class="btn btn-primary">Cancel</a>
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