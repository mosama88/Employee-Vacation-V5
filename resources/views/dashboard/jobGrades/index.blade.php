@extends('dashboard.layouts.main')

@section('title', 'الدرجه الوظيفية')

@section('content_header')
    <h1>الدرجه الوظيفية</h1>
@stop

@section('content')
    <x-header-page-component modalName="create-modal" modalIcon="fas fa-plus-square ml-2" modalTitle="أضافة درجه وظيفية جديدة "
        previousPage="لوحة التحكم" currentPage="الدرجه الوظيفية">

        {{-- تمرير المودال --}}
        <x-slot name="modal">
            @livewire('dashboard.jobGrades.create-job')
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

                    <!-- /.card-header -->

                    @livewire('dashboard.jobGrades.table-job')
                    @livewire('dashboard.jobGrades.edit-job')
                    @livewire('dashboard.jobGrades.delete-job')
                    @livewire('dashboard.jobGrades.show-job')


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
