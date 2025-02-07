@extends('dashboard.layouts.master')
@section('admin-active', 'active')
@section('title', 'الصفحة الرئيسية')

@section('content')
    <x-header-page-component titlePage="لوحة التحكم" previousPage="" currentPage="لوحة التحكم">
        <a href="{{ route('dashboard.admin') }}">
    </x-header-page-component>
    <h1>Hello Admin</h1>
@endsection
