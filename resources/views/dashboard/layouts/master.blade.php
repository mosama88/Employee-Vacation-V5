<!DOCTYPE html>
<html lang="en">

<head>

    @include('dashboard.layouts.header')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('dashboard') }}/assets/dist/img/AdminLTELogo.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->


        @include('dashboard.layouts.navbar')

        <!-- /.navbar -->



        <!-- Main Sidebar Container -->

        @include('dashboard.layouts.sidebar')



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            
            <!-- /.content-header -->

            <!-- Main content -->

            @yield('content')
      
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('dashboard.layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('dashboard.layouts.scripts')
</body>

</html>
