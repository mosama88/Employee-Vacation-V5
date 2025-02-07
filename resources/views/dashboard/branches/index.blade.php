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
            @include('dashboard.branches.create')
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
                        <h3 class=" col-3 text-right">

                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">الأسم</th>
                                    <th class="text-center">التليفون</th>
                                    <th class="text-center">العنوان</th>
                                    <th class="text-center">المحافظة</th>
                                    <th class="text-center">الأجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($data) && isset($data))
                                    @foreach ($data as $branch)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $branch->name }}</td>
                                            <td>{{ $branch->phone }}</td>
                                            <td>{{ $branch->address }}</td>
                                            <td>{{ $branch->governorate->name }}</td>
                                            <td>
                                                @include('dashboard.parials.actions', [
                                                    'name' => 'branches',
                                                    'name_id' => $branch->id,
                                                ])
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    لا توجد بيانات
                                @endif
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>
    </div>
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
