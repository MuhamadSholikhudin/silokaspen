        <!-- footer content -->
        <footer>
          <div class="pull-right">
            By Lisa Rachmawati
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        </div>
        </div>




        <!-- jQuery -->
        <script src="<?= base_url('assets/'); ?>vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('assets/'); ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="<?= base_url('assets/'); ?>vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?= base_url('assets/'); ?>vendors/nprogress/nprogress.js"></script>
        <!-- iCheck -->
        <script src="<?= base_url('assets/'); ?>vendors/iCheck/icheck.min.js"></script>
        <!-- Datatables -->
        <script type="text/javascript">
          $(document).ready(function() {
            $('#example').DataTable();

            // PAJAK 
            $('#idnotransaksi').change(function() {
              var id = $(this).val();
              $.ajax({
                url: "<?php echo site_url('pembantu/get_sub_id_saldop'); ?>",
                method: "POST",
                data: {
                  id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                  var html = '';
                  var i;
                  for (i = 0; i < data.length; i++) {
                    html += data[i].id_saldo;
                  }

                  var sis = '';
                  for (i = 0; i < data.length; i++) {
                    sis += data[i].sisa;
                  }
                  $('#id_saldo').val(html);
                  $('#sisa').val(sis);

                }
              });
              return false;
            });


            //#transaki
            // $('#idid_saldo').change(function() {
            //   var id = $(this).val();
            //   $.ajax({
            //     url: "<?php echo site_url('pembantu/get_sub_id_saldo'); ?>",
            //     method: "POST",
            //     data: {
            //       id: id
            //     },
            //     async: true,
            //     dataType: 'json',
            //     success: function(data) {
            //       var i;

            //       var sis = '';
            //       for (i = 0; i < data.length; i++) {
            //         sis += data[i].sisa;
            //       }
            //       // $('#id_saldo').html(html);
            //       $('#sisa').val(sis);

            //     }
            //   });
            //   return false;
            // });


            $('#carapembayaran').change(function() {
              var cara = $(this).val();
              if (cara == 'Tunai') {
                $('#kode_rekening').val("-");

              } else if (cara == 'Non-Tunai') {
                var kdjnspengeluaran = document.getElementById("kdjnspengeluaran").value;
                $.ajax({
                  url: "<?php echo site_url('pembantu/get_sub_kd_pengeluaran'); ?>",
                  method: "POST",
                  data: {
                    kdjnspengeluaran: kdjnspengeluaran
                  },
                  async: true,
                  dataType: 'json',
                  success: function(data) {
                    var i;
                    var sis = '';
                    for (i = 0; i < data.length; i++) {
                      sis += data[i].sisa;
                    }
                    $('#kode_rekening').val(sis);
                  }
                });
                return false;
              }
            });


            $('#kdjnspengeluaran').change(function() {

              var kdjnspengeluaran = document.getElementById("kdjnspengeluaran").value;
              $.ajax({
                url: "<?php echo site_url('pembantu/get_sub_kd_pengeluaran'); ?>",
                method: "POST",
                data: {
                  kdjnspengeluaran: kdjnspengeluaran
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                  var i;
                  var sis = '';
                  for (i = 0; i < data.length; i++) {
                    sis += data[i].sisa;
                  }
                  $('#kode_rekening').val(sis);
                  $('#carapembayaran').val("Non-Tunai");
                }
              });
              return false;

            });





            $("#pilihppn").change(function() {
              if (this.checked) {
                var nomtran = document.getElementById("nominaltransaksi").value;

                var ppn = (nomtran) * 0.1;
                $("#ppn").val(ppn);
              } else {
                //hide the text box
                $("#ppn").val(0);
              }
            });

            $("#pilihpph21").change(function() {
              if (this.checked) {
                var nomtran = document.getElementById("nominaltransaksi").value;

                if (nomtran <= 50000000) {
                  var pph21 = (nomtran * 0.05);
                } else if (nomtran > 50000000 && nomtran >= 250000000) {
                  var pph21 = (nomtran * 0.15);
                } else if (nomtran > 250000000 && nomtran >= 500000000) {
                  var pph21 = (nomtran * 0.25);
                }
                $("#pph21").val(pph21);
              } else {
                //hide the text box
                $("#pph21").val(0);
              }
            });

            $("#pilihpph22").change(function() {
              if (this.checked) {
                var nomtran = document.getElementById("nominaltransaksi").value;

                var pph22 = nomtran * 0.15;
                $("#pph22").val(pph22);
              } else {
                //hide the text box
                $("#pph22").val(0);
              }
            });

            $("#pilihpph23").change(function() {
              if (this.checked) {
                var nomtran = document.getElementById("nominaltransaksi").value;

                var pph23 = nomtran * 0.15;
                $("#pph23").val(pph23);
              } else {
                //hide the text box
                $("#pph23").val(0);
              }
            });



          });
        </script>



        <script type="text/javascript">
          //Saldo awal
          var rupiah = document.getElementById('saldomasuk1');
          rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            // document.getElementById("saldomasuk1").value = rupiah.value;


            rupiah.value = formatRupiah(this.value);
          });

          /* Fungsi formatRupiah */
          function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
              split = number_string.split(','),
              sisa = split[0].length % 3,
              rupiah = split[0].substr(0, sisa),
              ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
              separator = sisa ? '.' : '';
              rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
          }


          //Transaksi
          var rupiahtr = document.getElementById('jumlah1');
          rupiahtr.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            // document.getElementById("saldomasuk1").value = rupiah.value;


            rupiahtr.value = formatRupiah(this.value);
          });

          /* Fungsi formatRupiah */
          function formatRupiah1(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
              split = number_string.split(','),
              sisa = split[0].length % 3,
              rupiahtr = split[0].substr(0, sisa),
              ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
              separator = sisa ? '.' : '';
              rupiahtr += separator + ribuan.join('.');
            }

            rupiahtr = split[1] != undefined ? rupiahtr + ',' + split[1] : rupiahtr;
            return prefix == undefined ? rupiahtr : (rupiahtr ? rupiahtr : '');
          }
        </script>
        <!-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type=" text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
        <!-- <script type=" text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script> -->
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/jszip/dist/jszip.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/pdfmake/build/vfs_fonts.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?= base_url('assets/'); ?>build/js/custom.min.js"></script>

        <!-- <script>
          $().DataTable();
        </script> -->

        </body>

        </html>