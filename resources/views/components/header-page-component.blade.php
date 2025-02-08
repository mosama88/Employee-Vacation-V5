<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- زر المودال --}}
                @if ($modalTitle)
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#{{ $modalName }}">
                        <i class="{{ $modalIcon }}"></i> {{ $modalTitle }}
                    </button>
                @else
                    <a type="button" class="btn btn-default" href="{{ $url }}"><i
                            class="{{ $modalIcon }}"></i> {{ $routeName }}</a>
                @endif

                {{-- عرض محتوى المودال إذا تم تمريره --}}
                {{ $modal ?? '' }}
            </div><!-- /.col -->

            <div class="col-sm-6" dir="ltr">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item">
                        {{ $breadcrumb ?? '' }}
                    </li>
                    <li class="breadcrumb-item active">{{ $currentPage }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
