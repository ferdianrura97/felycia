<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href=" {{ asset('assets/img/logo/logo.png') }} " rel="icon">
  <title>{{ env("APP_NAME") }} - {{ (@$title ? $title : '') }}</title>
  <link href=" {{ asset('assets/vendor/fontawesome-free/css/all.min.css') }} " rel="stylesheet" type="text/css">
  <link href=" {{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css">
  <link href=" {{ asset('assets/css/ruang-admin.min.css') }} " rel="stylesheet">

  {{-- DataTable --}}
  <link href=" {{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }} " rel="stylesheet">

  <!-- Select2 -->
  <link href=" {{ asset('assets/vendor/select2/dist/css/select2.min.css') }} " rel="stylesheet" type="text/css">

  <!-- Bootstrap DatePicker -->  
  <link href=" {{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }} " rel="stylesheet" >

  <!-- Sweet Alert -->  
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

  <style>
    .select2-container--default .select2-selection--single{
      height: calc(1.5em + 0.75rem + 7px) !important;
      padding: 0.375rem 0.75rem !important;
      font-size: 1rem !important;
    }
  </style>
  @stack('style')
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('layouts._sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('layouts._topbar')
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          @include('layouts._breadcrumb')

          @yield('content')

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> 
              - {{ \Helper::getNamaProfil() }}
              {{-- <b><a href="#" target="_blank">Ferdian Ardhana</a></b> --}}
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  @include('layouts._footer')
  @stack('script')


  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  @include('sweet::alert')

    @if(Session::has('success'))
        <script>
            swal("Success!", "{!! session('success') !!}", "success");
        </script>
    @endif

    @if(Session::has('error'))
        <script>
            swal("Error!", "{!! session('error') !!}", "error");
        </script>
    @endif

    @if ($errors->any())
        <script>
            swal("Error!", "{{ json_encode($errors->all()) }}", "error");
        </script>
    @endif

    <script type="text/javascript">
      function hapus() {
        if (confirm("Apakah Anda yakin ingin menghapus data ini ?")) {

        } else {
          return false;
        }
      }
    </script>


</body>

</html>