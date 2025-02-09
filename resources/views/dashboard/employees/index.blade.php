<?php use Carbon\Carbon; ?>

@extends('dashboard.layouts.main')

@section('title', 'الموظفين')

@section('content_header')
    <h1>الموظفين</h1>
@stop

@section('content')
    <x-header-page-component url="{{ route('dashboard.employees.create') }}" routeName="أضافة موظف جديد"
        modalName="create-modal" modalIcon="fas fa-plus-square ml-2" modalTitle="" previousPage="لوحة التحكم"
        currentPage="الموظفين">

        {{-- تمرير المودال --}}
        <x-slot name="modal">

        </x-slot>

        {{-- تمرير المسار --}}
        <x-slot name="breadcrumb">
            <a href="{{ route('dashboard.admin') }}">لوحة التحكم</a>
        </x-slot>

    </x-header-page-component>
    <div class="container-fluid">
        <div class="row" dir="rtl">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">

                        @if (session('success') != null)
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        <h3 class=" col-3 text-right" dir="ltr">
                            {{-- With multiple slots, and lg size --}}
                            <x-adminlte-input name="iSearch" label="إبحث بالأسم أو رقم التليفون" wire:model.live="search"
                                placeholder="إبحث" igroup-size="lg">
                                <x-slot name="appendSlot">
                                </x-slot>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-danger">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">كود الموظف</th>
                                    <th class="text-center">الأسم</th>
                                    <th class="text-center">أسم المستخدم</th>
                                    <th class="text-center">الموبايل</th>
                                    <th class="text-center">تاريخ الميلاد</th>
                                    <th class="text-center">رصيد الاجازات</th>
                                    <th class="text-center">الفرع</th>
                                    <th class="text-center">الراحه الاسبوعية</th>
                                    <th class="text-center">الأجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($data) && isset($data))
                                    @foreach ($data as $employee)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $employee->employee_code }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->username }}</td>
                                            <td>{{ $employee->mobile }}</td>
                                            <td>{{ Carbon::parse($employee->birth_date)->format('Y-m-d') }}</td>
                                            <td>{{ $employee->leave_balance }}</td>
                                            <td>{{ $employee->branch->name }}</td>
                                            <td>{{ $employee->weeklyRest->name }}</td>

                                            <td>

                                                @include('dashboard.parials.actions', [
                                                    'name' => 'employees',
                                                    'name_id' => $employee->id,
                                                ])
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    لا توجد بيانات
                                @endif
                            </tbody>
                        </table>

                        {{ $data->links() }}
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>

        </div>
    </div>
@stop

@push('css')
@endpush

@push('js')
@endpush
