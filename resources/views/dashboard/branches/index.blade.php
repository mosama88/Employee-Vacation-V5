@extends('dashboard.layouts.main')

@section('title', 'الفروع')

@section('content_header')
    <h1>الفروع</h1>
@stop

@section('content')
    <x-header-page-component modalName="create-modal" modalIcon="fas fa-plus-square ml-2" modalTitle="أضافة فرع جديد"
        previousPage="لوحة التحكم" currentPage="الفروع">

        {{-- تمرير المودال --}}
        <x-slot name="modal">
            @livewire('dashboard.branches.create-branch')
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

                    @livewire('dashboard.branches.table-branch')
                    @livewire('dashboard.branches.edit-branch')
                    @livewire('dashboard.branches.delete-branch')
                    @livewire('dashboard.branches.show-branch')


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
