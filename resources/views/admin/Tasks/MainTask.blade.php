<x-admin-layout>


       
    <x-admin-contaner>
        <h3> المهام </h3>

                        <x-card-message />

                        <table class="table  table-striped table-centered mb-0">
                            <thead class="table-dark">

                                <tr>
                                    <th>#</th>
                                    <th>العنوان</th>
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

                                    <td class="cellControll">
                                        <a href="{{ url('/admin/ShowTask/' . $item->id) }}"><i
                                                class="mdi mdi-pencil"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $alltask->links('admin.pagination.custom') }}

                    </x-admin-contaner>

    <x-model-box></x-model-box>

</x-admin-layout>
