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
                    <td>{{ $item->job_id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td class="cellControll">
                        <a href="{{ url('/admin/JobApp/' . $item->id) }}">
                            <i class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel({{ $item }}))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $alljopapp->links('admin.pagination.custom') }}


        <script>
            function showModel(e) {

                return `<form method='POST' 
        
        action='{{ url('/admin/JobApp/${e.id}') }}' >
        @method('DELETE')
        @csrf
        <div class='formLaple' >
            <label> هل انت متأكد من حذف العنصر</label>
            <h3>${e.name}</h3>
            <button type='submit' class='btn btn-Danger' >حذف</button>
        </div>
        </form>`

            }
        </script>

        <x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout>
