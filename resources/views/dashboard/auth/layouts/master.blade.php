<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.auth.layouts.head')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ asset('dashboard') }}/assets/index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->

        @yield('auth-content')

    </div>
    <!-- /.login-box -->
    @include('dashboard.auth.layouts.scripts')


</body>

</html>
