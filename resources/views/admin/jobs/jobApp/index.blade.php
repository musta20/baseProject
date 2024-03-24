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
</x-admin-layout>
