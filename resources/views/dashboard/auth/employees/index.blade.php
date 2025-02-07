
@extends('dashboard.layouts.main')

@section('title', 'الصفحة الرئيسية')

@section('content_header')
    <h1>الصفحة الرئيسية</h1>
@stop

@section('content')
    <x-header-page-component modalName="" modalIcon="" modalTitle=""
        previousPage="لوحة التحكم" currentPage="">

        {{-- تمرير المودال --}}


        {{-- تمرير المسار --}}
        <x-slot name="breadcrumb">
            <a href="{{ route('dashboard.employee') }}">لوحة التحكم</a>
        </x-slot>

    </x-header-page-component>

@stop

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

@push('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@endpush
