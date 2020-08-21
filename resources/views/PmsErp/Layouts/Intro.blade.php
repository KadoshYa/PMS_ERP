<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title','PmsERP AdminPanel')</title>
    <link rel="icon" href="{{asset('PmsErp/img/favicon.png')}}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <link rel="stylesheet" href="{{ asset('PmsErp/asset/css/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('PmsErp/asset/css/dataTables.bootstrap4.css') }}">    
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('PmsErp/asset/css/adminlte.min.css') }}">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{ asset('PmsErp/asset/css/OverlayScrollbars.min.css') }}">
             <link rel="stylesheet" href="{{ asset('PmsErp/asset/css/toastr.min.css') }}" rel="stylesheet">
   
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">          

</head>
<body>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">




@yield('content')
        


</div>
<!-- ./wrapper -->

<script src="{{ asset('PmsErp/asset/js/jquery.min.js') }}"></script>

<script src="{{ asset('PmsErp/asset/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('PmsErp/asset/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('PmsErp/asset/js/adminlte.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('PmsErp/asset/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('PmsErp/asset/js/dataTables.bootstrap4.js') }}"></script>
<!-- AdminLTE App -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>    
<script src="{{ asset('PmsErp/asset/js/toastr.min.js') }}" ></script> 


<script>
@if(Session::has('success'))
toastr.success("{{Session::get('success')}}");
@endif
@if(Session::has('info'))
toastr.success("{{Session::get('info')}}");
@endif
</script>




</body>
</html>
