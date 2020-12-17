<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix">
        </div>
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
                                    1. Halaman ini adalah halaman transaksi untuk menginputkan transaksi yang terjadi berdasarkan saldo pada periode tertentu.
                                </p>
                            </li>
                            <li>
                                <p>
                                    2. Isikan Nomer, transaksi , Kode rekening tanggal ttansaksi yang terjadi setelah itu pilih kode saldo pada periode bulan tertentu nanti muncul saldo yang tersisa di periode tertentu.
                                </p>
                            </li>
                            <li>
                                <p>
                                    3. Pilih Kode Jenis pengeluaran, Kode Pengeluaran diambil dari tempat dinas belanja.
                                </p>
                            </li>
                            <li>
                                <p>
                                    4. Isilah Uraian apa saja barang yang telah di beli. Contoh: Pembelian Televisi, papan Tulis,
                                </p>
                            </li>
                            <li>
                                <p>
                                    5. Isi Jumlah sesuai dengan nominal pengeluaran yang telah dibelanjakan.
                                </p>
                            </li>
                            <li>
                                <p>
                                    6. jangan lupan input gambar sebagai bukti pembelanjaan telah dilakukan.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php

        // $cektran = $this->db->query(" SELECT * FROM tb_transaksi WHERE notransaksi NOT IN (SELECT notransaksi FROM tb_pajak)")->num_rows();
        $ceksal = $this->db->query(" SELECT * FROM tb_saldoawal WHERE status = 0 ")->num_rows();

        if ($ceksal < 1) {
        ?>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Input Data Transaksi</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content text-center">
                            <h1>Data Saldo Belum Dibuat oleh Bendahara Pengeluaran</h1>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        } elseif ($ceksal > 0) { ?>

        
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Input Data Transaksi</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="demo-form2" action="<?= base_url('pembantu/tambah_transaksi') ?>" method="POST" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="notransaksi">Nomer Transaksi <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="hidden" id="notransaksi" required="required" value="T<?= date("Ymdhi") ?>" name="notransaksi" class="form-control">
                                        <input type="text" required="required" value="T<?= date("Ymdhi") ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal transaksi <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="tgltransaksi" class="date-picker form-control" name="tgltransaksi" placeholder="dd-mm-yyyy" type="text" value="<?= date('d-m-Y') ?>" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_saldo">Id Saldo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <?php
                                        $saldolama = $this->db->query(" SELECT id_saldo, jumlahsaldosisa FROM tb_saldoawal ORDER BY tglsaldosisa DESC LIMIT 1");
                                        $row = $saldolama->row();
                                        $li = $row->id_saldo;
                                        $lo = $row->jumlahsaldosisa;
                                        ?>
                                        <input type="hidden" id="id_saldo" required="required" name="id_saldo" value="<?= $li ?>" class="form-control">
                                        <input type="text" id="id_saldo" required="required" value="<?= $li ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="item form-group d-none">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_saldo">Saldo Sisa <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">

                                        <input type="text" id="jumlahsaldosisa" required="required" name="sisa" value="<?= $lo ?>" class="form-control">
                                    </div>
                                </div>

                                <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="idid_saldo ">Kode Saldo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" id="idid_saldo" name="id_saldo">
                                        <option>Pilih Kode Saldo</option>
                                        <?php foreach ($id_saldo as $kd) : ?>
                                            <option value="<?= $kd->id_saldo ?>"> <?= $kd->id_saldo ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="text" id="sisa" name="sisa" required="required" class="form-control ">
                                </div>
                            </div> -->

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idusername">Id Username <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="hidden" name="idusername" value="<?= $this->session->userdata('idusername') ?>" required="required" class="form-control">
                                        <input type="text" id="idusername" value="<?= $this->session->userdata('username') ?>" required="required" class="form-control " readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kdjnspengeluaran">Id Jenis Pengeluaran <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="kdjnspengeluaran" name="kdjnspengeluaran">
                                            <?php foreach ($kdjnspengeluaran as $kdjns) : ?>
                                                <option value="<?= $kdjns->kdjnspengeluaran ?>"><?= $kdjns->kdjnspengeluaran ?> / <?= $kdjns->uraian ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="saldomasuk">Jumlah <span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" id="saldomasuk1" min="0" name="jumlah" required="required" class="form-control">
                                            
                                        </div>
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="kode_rekening">Kode Rekening <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="kode_rekening" required="required" name="kode_rekening" value="-" class="form-control " readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="namatoko">Nama Toko<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="namatoko" name="namatoko" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamattoko">Alamat Toko <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="alamattoko" name="alamattoko" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Gambar<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" id="gambar" name="gambar" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <a href="<?= base_url('pembantu/data_transaksi') ?>" class="btn btn-primary" type="button">Cancel</a>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


            </div>
        <?php    } ?>

        <!-- <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Input Data Transaksi</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" action="<?= base_url('pembantu/tambah_transaksi') ?>" method="POST" enctype="multipart/form-data" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="notransaksi">Nomer Transaksi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="notransaksi" required name="notransaksi" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal transaksi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="tgltransaksi" class="date-picker form-control" name="tgltransaksi" placeholder="dd-mm-yyyy" type="text" value="<?= date('d-m-Y') ?>" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_saldo">Id Saldo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <?php
                                    $saldolama = $this->db->query(" SELECT id_saldo, jumlahsaldosisa FROM tb_saldoawal WHERE status < 1 ORDER BY tglsaldosisa DESC");
                                    $row = $saldolama->row();
                                    $li = $row->id_saldo;
                                    $lo = $row->jumlahsaldosisa;
                                    ?>
                                    <input type="text" id="id_saldo" required="required" name="id_saldo" value="<?= $li ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="item form-group d-none">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_saldo">Saldo Sisa <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <input type="text" id="jumlahsaldosisa" required="required" name="sisa" value="<?= $lo ?>" class="form-control">
                                </div>
                            </div>

                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="idid_saldo ">Kode Saldo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" id="idid_saldo" name="id_saldo">
                                        <option>Pilih Kode Saldo</option>
                                        <?php foreach ($id_saldo as $kd) : ?>
                                            <option value="<?= $kd->id_saldo ?>"> <?= $kd->id_saldo ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="text" id="sisa" name="sisa" required="required" class="form-control ">
                                </div>
                            </div> -->

        <!--              <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="idusername">Id Username <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="hidden" name="idusername" value="<?= $this->session->userdata('idusername') ?>" required="required" class="form-control">
                                    <input type="text" id="idusername" value="<?= $this->session->userdata('idusername') ?>" required="required" class="form-control " readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kdjnspengeluaran">Kode Jenis Pengeluaran <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" id="kdjnspengeluaran" name="kdjnspengeluaran">
                                        <option>Pilih Kode Pengeluaran</option>
                                        <?php foreach ($kdjnspengeluaran as $kdjns) : ?>
                                            <option value="<?= $kdjns->kdjnspengeluaran ?>"><?= $kdjns->kdjnspengeluaran ?> / <?= $kdjns->uraian ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="jumlah">Jumlah <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="jumlah" min="0" name="jumlah" required="required" class="form-control">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kode_rekening">Kode Rekening <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="kode_rekening" required="required" name="kode_rekening" value="-" class="form-control " readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namatoko">Nama Toko<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="namatoko" name="namatoko" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamattoko">Alamat Toko <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea type="text" id="alamattoko" name="alamattoko" required="required" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Gambar<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="gambar" name="gambar" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div> -->


    </div>
</div>