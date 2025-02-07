<x-create-modal title="أضافة فرع">
    <div class="form-group">
        <label class="text-muted small" for="nameInput">أسم الفرع</label>
        <input type="text" wire:model="name" class="form-control text-right" id="nameInput"
            placeholder="أدخل أسم الفرع .....">
    </div>

    <div class="form-group">
        <label class="text-muted small" for="phoneInput">تليفون الفرع</label>
        <input type="text" wire:model="phone" class="form-control text-right" id="phoneInput"
            placeholder="أدخل تليفون الفرع .....">
    </div>

    <div class="form-group">
        <label class="text-muted small" for="addressInput">عنوان الفرع</label>
        <input type="text" wire:model="address" class="form-control text-right" id="addressInput"
            placeholder="أدخل عنوان الفرع .....">
    </div>

    <div class="form-group">
        <label>المحافظة التابع لها النيابه</label>
        <select class="form-control select2" style="width: 100%;">
            <option>-- أختر المحافظة --</option>
            @forelse ($other['governorates'] as $governorate)
                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>

            @empty
                لا توجد بيانات
            @endforelse
        </select>
    </div>
</x-create-modal>
