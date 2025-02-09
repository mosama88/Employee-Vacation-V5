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
                    <div class="row col-12" dir="rtl">
                        {{-- name --}}
                        <x-adminlte-input name="iLabel" label="أسم الموظف" placeholder="أدخل أسم الموظف...."
                            fgroup-class="col-md-4" />
                        {{-- username  --}}
                        <x-adminlte-input name="iLabel" label="أسم المستخدم" placeholder="أدخل أسم المستخدم...."
                            fgroup-class="col-md-4" />
                        {{-- password --}}
                        <x-adminlte-input name="iLabel" label="كلمة المرور" type="password" placeholder=" ***********...."
                            fgroup-class="col-md-4" />
                        {{-- mobile --}}
                        <x-adminlte-input name="iLabel" label="رقم الموبايل" placeholder="أدخل موبايل الموظف...."
                            fgroup-class="col-md-4" />
                        {{-- alt_mobile --}}
                        <x-adminlte-input name="iLabel" label="موبايل آخر" placeholder="أدخل موبايل آخر إن وجد...."
                            fgroup-class="col-md-4" />

                        {{-- Gender --}}
                        <x-adminlte-select label="نوع الجنس" fgroup-class="col-md-4" name="gender">
                            <option selected disabled>-- أختر نوع الجنس --</option>
                            <option value="male">ذكر</option>
                            <option value="female">أنثى</option>
                        </x-adminlte-select>

                        {{-- leave_balance --}}
                        <x-adminlte-input name="iLabel" label="رصيد الأجازات" placeholder="أدخل رصيد الأجازات 21...."
                            fgroup-class="col-md-6" />
                    </div>

                    <div class="row col-12" dir="ltr">
                        {{-- birth_date --}}
                        @php
                            $configBirthDate = [
                                'format' => 'YYYY-MM-DD',
                                'dayViewHeaderFormat' => 'MMM YYYY',
                                // 'minDate' => "js:moment().startOf('month')",
                                // 'maxDate' => "js:moment().endOf('month')",
                                'daysOfWeekDisabled' => [0, 6],
                            ];
                        @endphp
                        <x-adminlte-input-date name="birth_date" fgroup-class="col-6" label="تاريخ الميلاد" igroup-size="sm"
                            :config="$configBirthDate" placeholder="Choose a working day...">
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
                                'daysOfWeekDisabled' => [0, 6],
                            ];
                        @endphp
                        <x-adminlte-input-date name="start_work" fgroup-class="col-6" label="تاريخ بداية العمل"
                            igroup-size="sm" :config="$configStartWork" placeholder="Choose a working day..." class="form-control">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                    </div>


                    <div class="row">
                        {{-- Branch --}}
                        <x-adminlte-select2 name="branch_id">
                            <option>-- أختر الفرع --</option>
                            @if (!empty($other['branches']) && isset($other['branches']))
                                @foreach ($other['branches'] as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            @else
                                لا توجد بيانات
                            @endif
                        </x-adminlte-select2>


                        {{-- weekly Rest --}}
                        <x-adminlte-select2 name="weekly_rest_id">
                            <option>-- أختر الراحه الأسبوعية --</option>
                            @if (!empty($other['weekly_rests']) && isset($other['weekly_rests']))
                                @foreach ($other['weekly_rests'] as $weekly)
                                    <option value="{{ $weekly->id }}">{{ $weekly->name }}</option>
                                @endforeach
                            @else
                                لا توجد بيانات
                            @endif
                        </x-adminlte-select2>


                        {{-- job Grade --}}
                        <x-adminlte-select2 name="job_grade_id">
                            <option>-- أختر الراحه الأسبوعية --</option>
                            @if (!empty($other['job_grades']) && isset($other['job_grades']))
                                @foreach ($other['job_grades'] as $job)
                                    <option value="{{ $job->id }}">{{ $job->name }}</option>
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
@endpush
