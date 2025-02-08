<div class="modal fade" id="delete-modal" dir="ltr" wire:ignore.self>
    <div class="modal-dialog modal-xl bg-danger">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">{{ $titleDelete }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent='submit'>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <i class="fas fa-exclamation-triangle" style="color: #950f0f; font-size: 40px;"></i>
                        </div>
                    </div>
                    <h1 class="text-center text-danger">أنت على وشك الحذف!</h1>
                    <h3 class="text-center text-dark">هل تريد الحذف؟</h3>
                    {{ $slot }}
                </div>
                <div class="modal-footer mx-auto">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>

                    <button class="btn btn-danger" type="submit">
                        <div wire:loading.remove>

                            حذف </div>
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
