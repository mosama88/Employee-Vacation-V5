<x-delete-modal titleDelete="حذف الفرع">
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
                    <tr class="text-dark">
                        <td>{{ $name }}</td>
                        <td>{{ $phone }}</td>
                        <td>{{ $address }}</td>
                        <td>{{ $governorate_id }}</td>

                    </tr>

                </tbody>
            </table>
        </div>

</x-delete-modal>
