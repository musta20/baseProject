
<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>{{ $title }}</h3>
            </span>
            {{-- <a href="{{ route('admin.Task.create') }}"
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                اسناد مهمة</a> --}}

        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            {{ $AllOrder->filterLinks('laravelRecordsFilter::nav-filter') }}

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            عنوان الطلب
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الاسم
                        </th>
                            @if ($type != 0)
                            <th scope="col" class="px-6 py-3">
                                الفاتورة
                            </th>
                            @endif
                        <th scope="col" class="px-6 py-3">
                            تاريخ الاعتماد
                        </th>
                        <th scope="col" class="px-6 py-3">التحكم</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($AllOrder as $item)
                <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td scope="col" class="px-6 py-3">
                            {{ $item->title }}</td>

                            <td scope="col" class="px-6 py-3">
                                {{ $item->name }}</td>
                            @if ($type != 0)
                            <td scope="col" class="px-6 py-3">
                                <a target="_blank" href="{{ route('admin.billInnerPrint' , $item->id) }}">الفاتورة الداخلية</a>
                                <a target="_blank" href="{{ route('admin.billPrint' , $item->id) }}">فاتورة الزبون</a>
                            </td>
                        @endif
                        <td scope="col" class="px-6 py-3">
                            @if (!$item->approve_time)
                            غير معتد بعد
                            @else
                            {{ $item->approve_time }}
                              @endif
                        </td>
                        <td scope="col" class="px-6  flex gap-3 py-3">
                            <a href="{{ route('admin.Order.edit' , $item->id) }}">
                            تعديل
                        </a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Order.destroy' , $item->id) }}'))" href="#">
                          حذف
                        </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $AllOrder->links() }}

        </div>
    </div>
</x-admin.layout>
{{--
<x-admin-layout>

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
                            <a target="_blank" href="{{ route('admin.billInnerPrint' , $item->id) }}">الفاتورة الداخلية</a>
                            <a target="_blank" href="{{ route('admin.billPrint' , $item->id) }}">فاتورة الزبون</a>
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
 --}}
