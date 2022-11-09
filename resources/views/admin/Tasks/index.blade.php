<x-admin-layout>

    <h3> المهام </h3>

    <x-admin-contaner>

        <x-card-message />

        <a href="{{ url('/admin/Task/create') }}" class="btn btn-success btn-sm ms-3"> اسناد مهمة</a>

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
                        <a href="{{ url('/admin/Task/' . $item->id . '/edit') }}"><i
                                class="mdi mdi-pencil"></i></a>
                                <br>
                        <a onclick="OpenDeleteModel(showModel({{ $item }}))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $alltask->links('admin.pagination.custom') }}

        <script>
            function showModel(e) {

                return `<form method='POST' 
        
        action='{{ url('/admin/Clients/${e.id}') }}' >
        @method('DELETE')
        @csrf
        <div class='formLaple' >
            <label> هل انت متأكد من حذف العنصر</label>
            <h3>${e.title}</h3>
            <button type='submit' class='btn btn-Danger' >حذف</button>
        </div>
        </form>`

            }
        </script>

        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>
