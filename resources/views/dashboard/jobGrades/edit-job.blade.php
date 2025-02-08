<x-edit-modal titleEdit="تعديل فرع">
    <div class="row text-right" dir="rtl">
        {{-- أسم الدرجه الوظيفية --}}
        <div class="col-md-6">
            <x-adminlte-input wire:model="name" name="name" label="أسم الفرع" type="text"
                placeholder="أدخل أسم الدرجه الوظيفية ....." />
        </div>
    </div>
</x-edit-modal>
