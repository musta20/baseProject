<x-admin-layout>
    <h3> المبيعات</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>


        <a href="{{ url('/admin/NotifySales/create') }}" class="btn btn-success">مبيعات اسناد مهمة</a>

        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>الرقم</th>
                    <th> التحكم </th>
                </tr>
            </thead>


            @foreach ($alltask as $item)
                <tr>
                    <td>{{ $item->id }}</td>

                    <td>{{ $item->name }}</td>

                    <td>{{ $item->count }}</td>



                    <td class="table-action">
                        <a href="{{ url('/admin/NotifySales/' . $item->id . '/edit') }}"><i
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
        
        action='{{ url('/admin/NotifySales/${e.id}') }}' >
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
