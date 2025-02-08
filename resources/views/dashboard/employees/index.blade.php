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


                        <h3 class=" col-3 text-right" dir="ltr">
                            {{-- With multiple slots, and lg size --}}
                            <x-adminlte-input name="iSearch" label="إبحث بالأسم أو رقم التليفون" wire:model.live="search"
                                placeholder="إبحث" igroup-size="lg">
                                <x-slot name="appendSlot" >
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
                                    <th class="text-center">العنوان</th>
                                    <th class="text-center">الأجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($data) && isset($data))
                                    @foreach ($data as $branch)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $branch->employee_code }}</td>
                                            <td>{{ $branch->name }}</td>
                                            <td>{{ $branch->username }}</td>
                                            <td>{{ $branch->mobile }}</td>
                                            <td>{{ Carbon::parse($branch->birth_date)->format('Y-m-d') }}</td>
                                            <td>{{ $branch->leave_balance }}</td>
                                            <td>{{ $branch->branch->name }}</td>
                                            <td>{{ $branch->weeklyRest->name }}</td>

                                            <td>
                                                <div class="btn-group" dir="ltr">
                                                    <button type="button" class="btn btn-info">الأجراءات</button>
                                                    <button type="button"
                                                        class="btn btn-info dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu" style="">
                                                        <a class="dropdown-item text-right text-info" href=""
                                                            wire:click.prevent="$dispatch('BranchEdit',{id:{{ $branch->id }}})">تعديل
                                                            <i class="fas fa-edit ml-2"></i> </a>
                                                        <a class="dropdown-item text-right text-secondary" href=""
                                                            wire:click.prevent="$dispatch('BranchShow',{id:{{ $branch->id }}})">التفاصيل<i
                                                                class="fas fa-eye ml-2"></i> </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-right text-danger" href=""
                                                            wire:click.prevent="$dispatch('BranchDelete',{id:{{ $branch->id }}})">
                                                            حذف
                                                            <i class="fas fa-trash-alt ml-2"></i></a>
                                                    </div>
                                                </div>
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
