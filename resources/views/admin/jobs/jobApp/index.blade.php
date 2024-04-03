<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>طلبات التوظيف</h3>
            </span>


        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            {!! $filterBox !!}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                     

                        <th scope="col" class="px-6 py-3">الاسم</th>

                        <th scope="col" class="px-6 py-3">المسمى الوظيفي</th>

                        <th scope="col" class="px-6 py-3">تاريخ الطلب</th>
                        <th scope="col" class="px-6 py-3">التحكم</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($alljopapp as $item)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">

                        <td scope="col" class="px-6 py-3">
                            {{ $item->name }}
                        </td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->job->title}}
                        </td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->created_at }}</td>

                        <td scope="col" class="px-6  flex gap-3 py-3">
                            <a href="{{ route('admin.JobApp.edit' , $item->id) }}">
                               تعديل
                            </a>
                            <a  onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.JobApp.destroy' , $item->id) }}'))" 
                                href="#"
                                >
                                حذف
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $alljopapp->links() }}

        </div>
    </div>
</x-admin.layout>
{{-- 
<x-admin-layout>
    <h3>طلبات التوظيف</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />


        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th> المسمى الوظيفي</th>
                    <th>تاريخ الطلب</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            @foreach ($alljopapp as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->job->title }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td class="cellControll">
                        <a href="{{ route('admin.JobApp.edit' , $item->id) }}">
                            <i class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.JobApp.destroy' , $item->id) }}'))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $alljopapp->links('admin.pagination.custom') }}



        </script>

        <x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout> --}}
