@extends('dashboard.layouts.master')
@section('branch-active', 'active')
@section('title', 'الفروع')
@section('content')
    <x-header-page-component titlePage="جدول الفروع" previousPage="لوحة التحكم" currentPage="الفروع">
        <a href="{{ route('dashboard.admin') }}">
    </x-header-page-component>

    <div class="container-fluid">
        <div class="row" dir="rtl">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class=" col-3 text-right">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#create-modal">
                                <i class="fas fa-plus-square ml-2"></i> أضافة فرع جديد
                            </button>
                            @include('dashboard.branches.create')
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



@endsection
