            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">الأسم</th>
                            <th class="text-center">التليفون</th>
                            <th class="text-center">العنوان</th>
                            <th class="text-center">المحافظة</th>
                            <th class="text-center">الأجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($data) && isset($data))
                            @foreach ($data as $branch)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $branch->name }}</td>
                                    <td>{{ $branch->phone }}</td>
                                    <td>{{ $branch->address }}</td>
                                    <td>{{ $branch->governorate->name }}</td>
                                    <td>
                                        <div class="btn-group" dir="ltr">
                                            <button type="button" class="btn btn-info">الأجراءات</button>
                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu" style="">
                                                <a class="dropdown-item text-right text-info" href=""
                                                    wire:click.prevent="$dispatch('BranchEdit',{id:{{ $branch->id }}})">تعديل
                                                    <i class="fas fa-edit ml-2"></i> </a>
                                                <a class="dropdown-item text-right text-secondary" href=""
                                                    wire:click.prevent="$dispatch('BranchShow',{id:{{ $branch->id }}})">التفاصيل<i
                                                        class="fas fa-eye ml-2"></i> </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-right text-danger" href="">
                                                    حذف
                                                    <i class="fas fa-trash-alt ml-2"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            لا توجد بيانات
                        @endif
                    </tbody>
                </table>
            </div>
