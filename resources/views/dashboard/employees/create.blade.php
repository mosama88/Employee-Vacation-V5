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
                <form>
                    <div class="row col-12" dir="rtl">
                        {{-- name --}}
                        <x-adminlte-input name="iLabel" label="أسم الموظف" placeholder="أدخل أسم الموظف...."
                            fgroup-class="col-md-6" />
                        {{-- username  --}}
                        <x-adminlte-input name="iLabel" label="أسم المستخدم" placeholder="أدخل أسم المستخدم...."
                            fgroup-class="col-md-6" />
                        {{-- password --}}
                        <x-adminlte-input name="iLabel" label="كلمة المرور" type="password" placeholder=" ***********...."
                            fgroup-class="col-md-6" />
                        {{-- mobile --}}
                        <x-adminlte-input name="iLabel" label="رقم الموبايل" placeholder="أدخل موبايل الموظف...."
                            fgroup-class="col-md-6" />
                        {{-- alt_mobile --}}
                        <x-adminlte-input name="iLabel" label="موبايل آخر" placeholder="أدخل موبايل آخر إن وجد...."
                            fgroup-class="col-md-6" />
                        {{-- birth_date --}}
                        <x-adminlte-input name="iLabel" type="date" label="تاريخ الميلاد"
                            placeholder="أدخل أسم الموظف...." fgroup-class="col-md-6" />
                        {{-- start_work --}}
                        <x-adminlte-input name="iLabel" label="بداية العمل" placeholder="أدخل أسم الموظف...."
                            fgroup-class="col-md-6" />
                        {{-- leave_balance --}}
                        <x-adminlte-input name="iLabel" label="رصيد الأجازات" placeholder="أدخل رصيد الأجازات 21...."
                            fgroup-class="col-md-6" />

                        <div dir="ltr">
                            @php
                                $config = [
                                    'format' => 'YYYY-MM-DD HH.mm',
                                    'dayViewHeaderFormat' => 'MMM YYYY',
                                    'minDate' => "js:moment().startOf('month')",
                                    'maxDate' => "js:moment().endOf('month')",
                                    'daysOfWeekDisabled' => [0, 6],
                                ];
                            @endphp
                            <x-adminlte-input-date name="idSizeSm" label="Working Datetime" igroup-size="sm"
                                :config="$config" placeholder="Choose a working day...">
                                <x-slot name="appendSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-date>
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
