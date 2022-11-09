<x-admin-layout>
    <h3>انواع السجلات </h3>
    <hr>
    <x-admin-contaner>

        <x-card-message></x-card-message>

        <a href="{{ url('/admin/SalesType/create') }}" class="btn btn-Primary">إضافة مدينة</a>

        <table>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>السعر</th>
                <th>التحكم</th>
            </tr>
            @foreach ($NotifyType as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td class="cellControll">
                        <a href="{{ url('/admin/SalesType/' . $item->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a onclick="OpenDeleteModel(showModel({{ $item }}))" href="#"><i
                                class="fa-sharp fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $NotifyType->links('admin.pagination.custom') }}

        <script>
            function showModel(e) {

                return `<form method='POST' 
        
        action='{{ url('/admin/SalesType/${e.id}') }}' >
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
