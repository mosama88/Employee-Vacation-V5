<div class="btn-group" dir="ltr">
    <button type="button" class="btn btn-info">الأجراءات</button>
    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" role="menu" style="">
        <a class="dropdown-item text-right text-info" href="{{ route('dashboard.' . $name . '.edit', $name_id) }}">تعديل
            <i class="fas fa-edit ml-2"></i> </a>
        <a class="dropdown-item text-right text-secondary"
            href="{{ route('dashboard.' . $name . '.show', $name_id) }}">التفاصيل<i class="fas fa-eye ml-2"></i> </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-right text-danger" href="{{ route('dashboard.' . $name . '.destroy', $name_id) }}">
            حذف
            <i class="fas fa-trash-alt ml-2"></i></a>
    </div>
</div>
