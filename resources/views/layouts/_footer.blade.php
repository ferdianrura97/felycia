<script src=" {{ asset('assets/vendor/jquery/jquery.min.js') }} "></script>
<script src=" {{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<script src=" {{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }} "></script>
<script src=" {{ asset('assets/js/ruang-admin.min.js') }} "></script>
<script src=" {{ asset('assets/vendor/chart.js/Chart.min.js') }} "></script>
<script src=" {{ asset('assets/js/demo/chart-area-demo.js') }} "></script>

<!-- Jquery Mask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

<!-- Page level plugins -->
<script src=" {{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }} "></script>
<script src=" {{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }} "></script>

<!-- Select2 -->
<script src=" {{ asset('assets/vendor/select2/dist/js/select2.min.js') }} "></script>

<!-- Bootstrap Datepicker -->
<script src=" {{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }} "></script>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function () {
    //Jquery Mask
    $('.phone').mask('0000-0000-00000');
    $('.money').mask('000.000.000.000.000', {reverse: true});

    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    $('.dataTableLaporan').DataTable( {
        dom: 'Blfrtip',
        buttons: [
            {extend: 'excel', footer: true},
            {extend: 'print', footer: true},
        ],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );

    // Select2
    $('.select2').select2();

    // Bootstrap Date Picker
    $('.date').datepicker({
        format: 'yyyy-mm-dd',
        todayBtn: 'linked',
        todayHighlight: true,
        autoclose: true,        
      });

      $('form').on('submit', function () {
          $('button[type="submit"]').attr('disabled', 'disabled');
      });
  });
</script>
