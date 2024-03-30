

<x-admin.layout>
    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>جميع الموظفيين :</h3>
            </span>
            <a 
            
            href="{{ route('admin.Users.create') }}"
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                إضافة موظف</a>

        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            {{-- {!! $filterBox !!} --}}

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            الاسم</th>
                        <th scope="col" class="px-6 py-3">
                            الصلاحية</th>

                        <th scope="col" class="px-6 py-3">
                           البريد الالكتروني
                        </th>
                    
                        <th scope="col" class="px-6 py-3">التحكم</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($Users as $item)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
               

                        <td scope="col" class="px-6 py-3">
                            {{ $item->name }}</td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->getRoleNames() }}</td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->email }}</td>
                        

                        <td scope="col" class="gap-2 flex px-6 py-3">
                            @if ($item->hasAnyRole($allRole))
                            @if ($item->getRoleNames()[0] == 'مدير')
                                <a href="{{ route('admin.Users.edit', $item->id ) }}"><i
                                    class="mdi mdi-pencil"></i></a>
                            @else
                                <a href="{{ route('admin.Users.edit', $item->id ) }}"><i
                                    class="mdi mdi-pencil"></i></a>
                                <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Users.destroy' , $item->id) }}'))" href="#">
                                    حذف</a>
                            @endif
                        @else
                            <a href="{{ route('admin.Users.edit', $item->id ) }}">
                                تعديل</a>
                            <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Users.destroy' , $item->id) }}'))" href="#">
                                تعديل</a>
                        @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $Users->links() }}

        </div>
    </div>
</x-admin.layout>


{{-- 

<x-admin-layout>
    <h3>الموظفين</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />
        <div class="page-title p-1">

            <a href="{{ route('admin.Users.create') }}" class="btn btn-success"> اضافة موظف</a>
        </div>
        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم </th>
                    <th>الصلاحية</th>
                    <th>البريد الالكتروني </th>

                    <th>التحكم</th>
                </tr>
            </thead>
            @foreach ($Users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    @if ($item->hasAnyRole($allRole))
                        <td>{{ __($item->roles->pluck('name')[0]) }}</td>
                    @else
                        <td>
                            لايوجد صلاحية
                        </td>
                    @endif


                    <td>{{ $item->email }}</td>
                    <td class="cellControll">

                        @if ($item->hasAnyRole($allRole))
                            @if ($item->getRoleNames()[0] == 'مدير')
                                <a href="{{ route('admin.Users.edit', $item->id ) }}"><i
                                    class="mdi mdi-pencil"></i></a>
                            @else
                                <a href="{{ route('admin.Users.edit', $item->id ) }}"><i
                                    class="mdi mdi-pencil"></i></a>
                                <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Users.destroy' , $item->id) }}'))" href="#"><i
                                    class="mdi mdi-delete"></i></a>
                            @endif
                        @else
                            <a href="{{ route('admin.Users.edit', $item->id ) }}"><i
                                    class="mdi mdi-pencil"></i></a>
                            <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Users.destroy' , $item->id) }}'))" href="#"><i
                                    class="mdi mdi-delete"></i></a>
                        @endif

                    </td>
                </tr>
            @endforeach
        </table>
        {{ $Users->links('admin.pagination.custom') }}


    

        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>
 --}}
















