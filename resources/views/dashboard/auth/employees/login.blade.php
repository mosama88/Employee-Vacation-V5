@extends('dashboard.auth.layouts.master')
@section('auth-content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">قم بتسجيل الدخول للموظفين</p>

            <form action="{{ route('employee.login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        placeholder="البريد الالكترونى" value="{{ old('username') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('username')
                        <div class="invalid-feedback d-block text-right">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="كلمة المرور *********">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block text-right">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <div class="icheck-primary">
                            <label for="remember">
                                تذكرنى
                            </label>
                            <input type="checkbox" id="remember">
                        </div>
                    </div>
                    <!-- /.col -->

                </div>
                <div class="row col-12">
                    <button type="submit" class="btn btn-primary btn-md mx-auto">تسجيل الدخول</button>
                </div>

            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-secondary">
                    <i class="fas fa-phone-square-alt mr-2"></i> التواصل مع الدعم الفنى
                </a>
            </div>
            <!-- /.social-auth-links -->


            <p class="mb-0">
                <a href="" class="text-center">تسجيل عضوية جديدة</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
