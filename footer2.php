  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2022 . PT. Trafoindo Prima Perkasa</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="assets/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- Page specific script -->


<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="assets/plugins/editable/jquery.tabledit.js"></script>

<script>
  $(function () {
    $("#exampleOpen").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "pdf", "colvis"]
    }).buttons().container().appendTo('#exampleOpen_wrapper .col-md-6:eq(0)');

    $("#exampleApprove").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "pdf", "colvis"]
    }).buttons().container().appendTo('#exampleApprove_wrapper .col-md-6:eq(0)');

    $("#examplePrint").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "pdf", "colvis"]
    }).buttons().container().appendTo('#examplePrint_wrapper .col-md-6:eq(0)');

    $("#exampleRevisi").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "pdf", "colvis"]
    }).buttons().container().appendTo('#exampleRevisi_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
      $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> 

<script>
  $(function () {
    $("#dashboar1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#dashboar1_wrapper .col-md-6:eq(0)');
    $("#dashboar2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#dashboar2_wrapper .col-md-6:eq(0)');
    $("#dashboar3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#dashboar3_wrapper .col-md-6:eq(0)');
    $("#dashboar4").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#dashboar4_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $('#transdate').datetimepicker({
        format: 'DD/MM/Y'
    });

    $('#delivery_date').datetimepicker({
        format: 'L'
    });
  });

</script> 

<script type="text/javascript">
  $(function () {
  //Date picker Delivery Date
    $('#delivery_date').datetimepicker({
        format: 'L'
    });

  });
</script>

<script type="text/javascript">
  function isi_otomatis4(){
      var id_currency = $("#id_currency").val();
      $.ajax({
          url: 'autofill_currency.php',
          data:"id_currency="+id_currency ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
      $('#code_currency').val(obj.code_currency);
      $('#rate_currency').val(obj.rate_currency);
      });
  }
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>


<script>
function autofill(){
  var noprospect = $("#noprospect").val(); 
  $.ajax({
    url : 'autofill.php', // file proses penginputan
    data : 'noprospect='+noprospect,
  }).success(function (data){
    var json = data,
    obj = JSON.parse(json);
    $('#perusahaan_cust').val(obj.perusahaan_cust);
    $('#project_cust').val(obj.project_cust);
    $('#segment').val(obj.segment);
    $('#sub_segment').val(obj.sub_segment);
    $('#nama_sales').val(obj.nama_sales);
    $('#type_trafo').val(obj.type_trafo);
    $('#groupsales').val(obj.groupsales);
  })
}
</script>
     
</body>
</html>