        <!-- footer content -->
        <footer>
          <div class="pull-right kiri">
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
                url: "<?php echo site_url('pembantu/get_sub_kdsaldop'); ?>",
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
                    html += data[i].kdsaldo;
                  }

                  var sis = '';
                  for (i = 0; i < data.length; i++) {
                    sis += data[i].sisa;
                  }
                  $('#kdsaldo').val(html);
                  $('#sisa').val(sis);

                }
              });
              return false;
            });


            $('#idkdsaldo').change(function() {
              var id = $(this).val();
              $.ajax({
                url: "<?php echo site_url('pembantu/get_sub_kdsaldo'); ?>",
                method: "POST",
                data: {
                  id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                  var i;

                  var sis = '';
                  for (i = 0; i < data.length; i++) {
                    sis += data[i].sisa;
                  }
                  // $('#kdsaldo').html(html);
                  $('#sisa').val(sis);

                }
              });
              return false;
            });



          });
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