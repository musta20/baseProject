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
