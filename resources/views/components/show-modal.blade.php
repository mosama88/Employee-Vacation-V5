<div class="modal fade" id="show-modal" dir="ltr" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $titleShow }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">

                    {{ $slot }}
                </div>
                <div class="modal-footer mx-auto">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
