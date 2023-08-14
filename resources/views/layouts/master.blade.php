<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GesFabrik | App</title>
    <!-- plugins:css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.5.1.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/typicons/src/font/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}"/>


</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('partials._navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
    @include('partials._sidebar')
    <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>

            @include('partials._modals')
        @include('partials._footer')
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/vendors/js/vendor.bundle.addons.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('assets/js/shared/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/shared/misc.js')}}"></script>

<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('assets/js/demo_1/dashboard.js')}}"></script>
<!-- End custom js for this page-->
</body>
@yield('javascript')
</html>
