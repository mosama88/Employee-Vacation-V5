@extends('adminlte::page')





@section('css')
    {{-- RTL --}}
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/rtl.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css"> --}}

    <style>
        .select2-container--default .select2-selection--single {
            height: 40px;
            /* لتحديد ارتفاع الحقل */
            line-height: 40px;
            /* لضبط النص في المنتصف */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
            /* لضبط السهم */
        }
    </style>

@stop

@section('js')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script>
        //to open and close modal
        // if Open will be close
        // if Close will be open
        window.addEventListener('createModalToggle', event => {
            $("#create-modal").modal("toggle");
        });

        //to open and close modal
        window.addEventListener('editModalToggle', event => {
            $("#edit-modal").modal("toggle");
        });

        //to open and close modal
        window.addEventListener('deleteModalToggle', event => {
            $("#delete-modal").modal("toggle");
        });
        //to open and close modal
        window.addEventListener('showModalToggle', event => {
            $("#show-modal").modal("toggle");
        });
    </script>
@stop
