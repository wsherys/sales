<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>
   
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"> -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/ajaxtbl/css/bootstrap.min.css') ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/ajaxtbl/datatables/lib/css/dataTables.bootstrap.min.css') ?>"/>
        

    <section class="content">
      <div class="container-fluid">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Kode Bisnis</th>
                    <th>Kode Nomor</th>
                    <th>Nama Bisnis</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody></tbody>
            </table>
          </div>
      </div>
    </section>

          <!-- Load Jquery & Datatable JS -->
          <script type="text/javascript" src="<?php echo base_url('assets/ajaxtbl/js/jquery.min.js') ?>"></script>
          <script type="text/javascript" src="<?php echo base_url('assets/ajaxtbl/datatables/datatables.min.js') ?>"></script>
          <script type="text/javascript" src="<?php echo base_url('assets/ajaxtbl/datatables/lib/js/dataTables.bootstrap.min.js') ?>"></script>
          <!-- jQuery -->
          <!-- <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script> -->
          <!-- jQuery UI 1.11.4 -->
          <script src="<?= base_url(); ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
          <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
          <script>
          $.widget.bridge('uibutton', $.ui.button)
          </script>
          <!-- Bootstrap 4 -->
          <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
          <!-- ChartJS -->
          <script src="<?= base_url(); ?>/assets/plugins/chart.js/Chart.min.js"></script>
          <!-- Sparkline -->
          <script src="<?= base_url(); ?>/assets/plugins/sparklines/sparkline.js"></script>
          <!-- JQVMap -->
          <script src="<?= base_url(); ?>/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
          <script src="<?= base_url(); ?>/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
          <!-- jQuery Knob Chart -->
          <script src="<?= base_url(); ?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
          <!-- daterangepicker -->
          <script src="<?= base_url(); ?>/assets/plugins/moment/moment.min.js"></script>
          <script src="<?= base_url(); ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
          <!-- Tempusdominus Bootstrap 4 -->
          <script src="<?= base_url(); ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
          <!-- Summernote -->
          <script src="<?= base_url(); ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
          <!-- overlayScrollbars -->
          <script src="<?= base_url(); ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
          <!-- AdminLTE App -->
          <script src="<?= base_url(); ?>/assets/dist/js/adminlte.js"></script>
          <!-- AdminLTE for demo purposes -->
          <script src="<?= base_url(); ?>/assets/dist/js/demo.js"></script>

         

          <script>
          $(document).ready(function() {
          $('#example').DataTable();
          } );
          </script>
          <!-- <script>
          var tabel = null;
          $(document).ready(function() {
            
              tabel = $('#example').DataTable({
                  "processing": true,
                  "serverSide": true,
                  "ordering": true, // Set true agar bisa di sorting
                  "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
                  "ajax":
                  {
                      "url": "<?php echo base_url('index.php/CtrlBisnis/tbl') ?>", // URL file untuk proses select datanya
                      "type": "POST"
                  },
                  "deferRender": true,
                  "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
                  "columns": [
                      { "data": "kode_bisnis" }, // Tampilkan nis
                      { "data": "kode_nomor" },  // Tampilkan nama
                      { "data": "nama_bisnis" }, // Tampilkan telepon
                      { "data": "status" }, // Tampilkan alamat
                      { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                              var html  = "<a href=''>EDIT</a> | "
                              html += "<a href=''>DELETE</a>"
                              return html
                          }
                      },
                  ],
              });
          });
          </script> -->

        </div>






      <!-- /.row -->
      </div>
      <!-- Main row -->
    

</body>
</html>
