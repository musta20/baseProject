<x-admin-layout>

    <h3> المهام </h3>
<hr>
    <x-admin-contaner>

        <x-card-message />

        <a href="{{ route('admin.Task.create') }}" class="btn btn-success btn-sm ms-3"> اسناد مهمة</a>

        </div>
        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">

            <tr>

                <th>#</th>
                <th>العنوان</th>
                <th>الموظف</th>
                <th>البداية </th>
                <th>الانتهاء </th>
                <th>الحالة</th>
                <th>التحكم</th>

            </tr>

            </thead>


            @foreach ($alltask as $item)
                <tr>
                    <td>{{ $item->id }}</td>

                    <td>{{ $item->title }}</td>

                    <td>{{ $item->user->name }}</td>

                    <td>{{ $item->start }}</td>
                    <td>{{ $item->end }}</td>
                    <td>
                        @switch($item->isdone)
                            @case(0)
                                لم يستلم المعهمة بعد
                            @break

                            @case(1)
                                بداء العمل عليها
                            @break

                            @case(2)
                                انجز جزئي للمهمة
                            @break

                            @default
                        @endswitch
                    </td>

                    <td class="table-action">
                        <a href="{{ route('admin.Task.edit' , $item->id) }}"><i
                                class="mdi mdi-pencil"></i></a>
                                <br>
                        <a onclick="OpenDeleteModel(showModel({{ $item->title }},'{{ route('admin.Task.destroy', $item->id) }}'))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $alltask->links('admin.pagination.custom') }}



        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>
