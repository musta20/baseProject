<x-admin-layout>

    <h3>{{ $title }}</h3>

    <x-admin-contaner>
        <x-card-message />


        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>عنوان الطلب</th>
                    <th>الاسم</th>

                    @if ($type != 0)
                        <th>الفاتورة</th>
                    @else
                    @endif


                    <th> تاريخ الاعتماد</th>
                    <th> التحكم</th>
                </tr>
            </thead>
            @foreach ($AllOrder as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @if (!$item->approve_time)
                            غير معتد بعد
                        @else
                            {{ $item->approve_time }}
                        @endif

                    </td>
                    @if ($type != 0)
                        <td>
                            <a target="_blank" href="{{ route('admin.BillInnerPrint' , $item->id) }}">الفاتورة الداخلية</a>
                            <a target="_blank" href="{{ route('admin.Billprint' , $item->id) }}">فاتورة الزبون</a>
                        </td>
                    @else
                    @endif

                    <td class="table-action">
                        <a href="{{ route('admin.Order.edit' , $item->id) }}">
                            <i class="mdi mdi-pencil"></i>
                        </a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Order.destroy' , $item->id) }}'))" href="#"><i
                            class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $AllOrder->links('admin.pagination.custom') }}

        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>
