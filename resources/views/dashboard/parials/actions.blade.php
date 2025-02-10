<div class="btn-group" dir="ltr">
    <button type="button" class="btn btn-info">الأجراءات</button>
    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" role="menu" style="">
        <a class="dropdown-item text-right text-info" href="{{ route('dashboard.' . $name . '.edit', $name_id) }}">تعديل
            <i class="fas fa-edit ml-2"></i> </a>
        <a class="dropdown-item text-right text-secondary" href="">التفاصيل<i class="fas fa-eye ml-2"></i> </a>
        <div class="dropdown-divider"></div>

        <form id="delete-form-{{ $name_id }}" action="{{ route('dashboard.' . $name . '.destroy', $name_id) }}"
            method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        <button id="delete_one" data-id="{{ $name_id }}" class="delete-btn dropdown-item text-right text-danger">
            حذف
            <i class="fas fa-trash-alt ml-2"></i></button>

    </div>
</div>


@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Attach event listener to delete buttons
            document.querySelectorAll('.delete-btn').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default behavior

                    // Retrieve the form ID from the button's data attribute
                    const nameId = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-form-${nameId}`);

                    // Display SweetAlert confirmation dialog
                    Swal.fire({
                        title: "هل أنت متأكد؟",
                        text: "أنت على وشك حذف العناصر المحددة!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: "نعم، احذفها",
                        cancelButtonText: "لا، إلغاء!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Perform AJAX request
                            fetch(form.action, {
                                    method: 'POST',
                                    body: new FormData(form),
                                    headers: {
                                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // Add CSRF token
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            title: "تم الحذف",
                                            text: data
                                                .message, // هذه الرسالة تأتي من الـ Controller
                                            icon: 'success',
                                            timer: 1500,
                                            showConfirmButton: false
                                        }).then(() => {
                                            location
                                                .reload(); // Reload the page
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "خطأ",
                                            text: data.message ||
                                                "{{ __('action.unexpected_error_occurred') }}",
                                            icon: 'error'
                                        });
                                    }
                                })
                                .catch(error => {
                                    Swal.fire({
                                        title: "خطأ",
                                        text: "{{ __('action.unexpected_error_occurred') }}",
                                        icon: 'error'
                                    });
                                });
                        }
                    });
                });
            });
        });
    </script>
@endpush
