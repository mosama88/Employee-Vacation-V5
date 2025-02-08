<x-create-modal title="أضافة فرع">
    <div class="row text-right" dir="rtl">
        {{-- أسم الفرع --}}
        <div class="col-md-6">
            <x-adminlte-input wire:model="name" name="name" label="أسم الفرع" type="text"
                placeholder="أدخل أسم الفرع ....." />
        </div>



        {{-- تليفون الفرع --}}
        <x-adminlte-input wire:model="phone" name="phone" label="تليفون الفرع" fgroup-class="col-md-6" type="text"
            placeholder="أدخل تليفون الفرع ....." />
    </div>


    <div class="row text-right" dir="rtl">
        {{-- عنوان الفرع --}}
        <x-adminlte-input wire:model="address" name="address" label="عنوان الفرع" fgroup-class="col-md-12"
            type="text" placeholder="أدخل عنوان الفرع ....." />
    </div>
    {{-- المحافظة التابع لها النيابه --}}
    <div class="row text-right" dir="rtl">
        <div class="col-md-12">
            <label class="form-label">المحافظة التابع لها النيابه</label>
            <x-adminlte-select2 wire:model="governorate_id" name="governorate_id" class="form-control js-example-basic-single"
                name="sel2Basic">
                <option>-- أختر المحافظة --</option>
                @forelse ($other['governorates'] as $governorate)
                    <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                @empty
                    لا توجد بيانات
                @endforelse
            </x-adminlte-select2>
        </div>
    </div>
</x-create-modal>
