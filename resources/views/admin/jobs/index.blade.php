<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>الوظائف</h3>
            </span>
            <a href="{{ route('admin.Jobs.create') }}"
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                إضافة وظيفة</a>

        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            {!! $filterBox !!}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>


                        <th scope="col" class="px-6 py-3">المسمى الوظيفي</th>

                        <th scope="col" class="px-6 py-3">الوصف الوظيفي</th>

                        <th scope="col" class="px-6 py-3">مقر الوظيفة</th>
                        <th scope="col" class="px-6 py-3">التحكم</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($alljobs as $item)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td scope="col" class="px-6 py-3">
                            {{ $item->title }}</td>

                            <td scope="col" class="px-6 py-3">
                                {{ $item->des }}</td>
                                <td scope="col" class="px-6 py-3">
                                    {{ $item->city->name }}</td>

                        <td scope="col" class="px-6  flex gap-3 py-3">
                            <a href="{{ route('admin.Jobs.edit' , $item->id) }}">
                               تعديل
                            </a>
                            <a href="#" onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Jobs.destroy',$item->id) }}'))"
                                >
                                حذف
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $alljobs->links() }}

        </div>
    </div>
</x-admin.layout>


{{--  --}}



{{--
<x-admin-layout>
    <h3> الوظائف</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />
        <div class="page-title p-1">
            <a href="{{ route('admin.Jobs.create') }}" class="btn btn-success">إضافة وظيفة</a>
        </div>
        </div>
        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>المسمى الوظيفي</th>
                    <th>الوصف الوظيفي</th>
                    <th>مقر الوظيفة</th>
                </tr>
            </thead>
            @foreach ($alljobs as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->des }}</td>
                    <td class="table-action">
                        <a href="{{ route('admin.Jobs.index' , $item->id) }}"><i class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Jobs.destroy',$item->id) }}'))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $alljobs->links('admin.pagination.custom') }}
        <x-model-box></x-model-box>
    </x-admin-contaner>
</x-admin-layout> --}}