<x-show-modal titleShow="تفاصيل الفرع">
    <div class="row text-right" dir="rtl">
        <div class="row col-12">
            <table class="table table-bordered border-primary">
                <thead class="bg-secondary">
                    <tr>
                        <th scope="col">أسم الفرع</th>
                        <th scope="col">تليفون الفرع</th>
                        <th scope="col">عنوان الفرع</th>
                        <th scope="col">المحافظة التابع لها النيابه</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $name }}</td>
                        <td>{{ $phone }}</td>
                        <td>{{ $address }}</td>
                        <td>{{ $governorate_id }}</td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>


</x-show-modal>
