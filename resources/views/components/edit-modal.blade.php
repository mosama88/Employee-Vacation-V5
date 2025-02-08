<div class="modal fade" id="edit-modal" dir="ltr" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $titleEdit }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent='submit'>
                <div class="modal-body">

                    {{ $slot }}
                </div>
                <div class="modal-footer mx-auto">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>

                    <button class="btn btn-primary" type="submit">
                        <div wire:loading.remove>

                            تعديل البيانات </div>
                        <div class="spinner-border spinner-border-sm text-secondary ms-2" wire:loading
                            wire:target="submit" role="status">
                            @section('preloader')
                                <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
                                <h4 class="mt-4 text-dark">Loading</h4>
                            @stop
                        </div>

                    </button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
