<?php use Carbon\Carbon; ?>

@extends('dashboard.layouts.main')

@section('title', 'الموظفين')

@section('content_header')
    <h1>الموظفين</h1>
@stop

@section('content')
    <x-header-page-component url="" routeName="" modalName="" modalIcon="" modalTitle="" previousPage="لوحة التحكم"
        currentPage="أضافة موظف">

        {{-- تمرير المسار --}}
        <x-slot name="breadcrumb">
            <a href="{{ route('dashboard.employees.index') }}">الموظفين</a>
        </x-slot>
    </x-header-page-component>
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">أضف بيانات الموظف</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('dashboard.employees.store') }}" method="POST">
                    @csrf
                    <div class="row col-12 mt-2" dir="rtl">
                        {{-- name --}}
                        <x-adminlte-input name="name" label="أسم الموظف" value="{{ old('name') }}"
                            placeholder="أدخل أسم الموظف...." fgroup-class="col-md-4" />

                        {{-- mobile --}}
                        <x-adminlte-input name="mobile" label="رقم الموبايل" value="{{ old('mobile') }}"
                            placeholder="أدخل موبايل الموظف...." fgroup-class="col-md-4" />

                        {{-- alt_mobile --}}
                        <x-adminlte-input name="alt_mobile" label="موبايل آخر" value="{{ old('alt_mobile') }}"
                            placeholder="أدخل موبايل آخر إن وجد...." fgroup-class="col-md-4" />

                        {{-- username  --}}
                        <x-adminlte-input name="username" label="أسم المستخدم" value="{{ old('username') }}"
                            placeholder="أدخل أسم المستخدم...." fgroup-class="col-md-4" />

                        {{-- password --}}
                        <x-adminlte-input name="password" label="كلمة المرور" type="password" value="{{ old('password') }}"
                            placeholder=" ***********...." fgroup-class="col-md-4" />


                        {{-- Type --}}
                        <x-adminlte-select label="نوع الحساب" fgroup-class="col-md-4" name="type">
                            <option selected disabled>-- أختر نوع الحساب --</option>
                            <option @if (old('type') == 'employee') selected @endif value="employee">موظف</option>
                            <option @if (old('type') == 'manager') selected @endif value="manager">مدير</option>
                        </x-adminlte-select>



                        {{-- Gender --}}
                        <x-adminlte-select label="نوع الجنس" fgroup-class="col-md-4" name="gender">
                            <option selected disabled>-- أختر نوع الجنس --</option>
                            <option @if (old('gender') == 'male') selected @endif value="male">ذكر</option>
                            <option @if (old('gender') == 'female') selected @endif value="female">أنثى</option>
                        </x-adminlte-select>

                        {{-- leave_balance --}}
                        <x-adminlte-input name="leave_balance" label="رصيد الأجازات" value="{{ old('leave_balance') }}"
                            placeholder="أدخل رصيد الأجازات 21...." fgroup-class="col-md-4" />
                    </div>

                    <div class="row col-12" dir="ltr">
                        {{-- birth_date --}}
                        @php
                            $configBirthDate = [
                                'format' => 'YYYY-MM-DD',
                                'dayViewHeaderFormat' => 'MMM YYYY',
                            ];
                        @endphp
                        <x-adminlte-input-date name="birth_date" fgroup-class="col-6" value="{{ old('birth_date') }}"
                            label="تاريخ الميلاد" igroup-size="sm" :config="$configBirthDate" placeholder="أختر تاريخ الميلاد">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>

                        {{-- start_work --}}
                        @php
                            $configStartWork = [
                                'format' => 'YYYY-MM-DD',
                                'dayViewHeaderFormat' => 'MMM YYYY',
                            ];
                        @endphp
                        <x-adminlte-input-date name="start_work" fgroup-class="col-6" value="{{ old('start_work') }}"
                            label="تاريخ بداية العمل" igroup-size="sm" :config="$configStartWork"
                            placeholder="أختر تاريخ بداية العمل" class="form-control">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                    </div>


                    <div class="row col-12">
                        {{-- Branch --}}
                        <x-adminlte-select2 label="الفرع" fgroup-class="col-4" class="js-example-rtl" name="branch_id">
                            <option>-- أختر الفرع --</option>
                            @if (!empty($other['branches']) && isset($other['branches']))
                                @foreach ($other['branches'] as $branch)
                                    <option @if (old('branch_id') == $branch->id) selected @endif value="{{ $branch->id }}">
                                        {{ $branch->name }}</option>
                                @endforeach
                            @else
                                لا توجد بيانات
                            @endif
                        </x-adminlte-select2>


                        {{-- weekly Rest --}}
                        <x-adminlte-select2 label="الراحه الاسبوعية" fgroup-class="col-4" class="js-example-rtl"
                            name="weekly_rest_id">
                            <option>-- أختر الراحه الأسبوعية --</option>
                            @if (!empty($other['weekly_rests']) && isset($other['weekly_rests']))
                                @foreach ($other['weekly_rests'] as $weekly)
                                    <option @if (old('weekly_rest_id') == $weekly->id) selected @endif value="{{ $weekly->id }}">
                                        {{ $weekly->name }}</option>
                                @endforeach
                            @else
                                لا توجد بيانات
                            @endif
                        </x-adminlte-select2>


                        {{-- job Grade --}}
                        <x-adminlte-select2 label="الدرجه الوظيفية" fgroup-class="col-4" class="js-example-rtl"
                            name="job_grade_id">
                            <option>-- أختر الدرجه الوظيفية --</option>
                            @if (!empty($other['job_grades']) && isset($other['job_grades']))
                                @foreach ($other['job_grades'] as $job)
                                    <option @if (old('job_grade_id') == $job->id) selected @endif value="{{ $job->id }}">
                                        {{ $job->name }}</option>
                                @endforeach
                            @else
                                لا توجد بيانات
                            @endif
                        </x-adminlte-select2>

                    </div>

                    <!-- /.card-body -->

                    @include('dashboard.parials.footer-buttons', [
                        'submitName' => 'حفظ البيانات',
                        'btnColor' => 'primary',
                    ])
                </form>
            </div>

        </div>
    </div>
@stop

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            $(".js-example-rtl").select2({
                dir: "rtl"
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            $(".custom-select2").select2({
                theme: "bootstrap-5",
                placeholder: "اختر الراحة الأسبوعية",
                allowClear: true,
                width: '100%'
            });
        });
    </script> --}}
@endpush
