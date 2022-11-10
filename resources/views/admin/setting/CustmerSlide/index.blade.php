<x-admin-layout>
    <h3>السلايدات </h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />
        <div class="page-title p-1">

            <a href="{{ url('/admin/CustmerSlide/create') }}" class="btn btn-success">إضافة سلايد</a>

        </div>

        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الصورة</th>
                    <th>الرابط</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            @foreach ($CustmerSlide as $item)
                <tr>
                    <td>{{ $item->id }}</td>

                    <td><a target="blank" href="{{ url('storage/' . $item->img) }}"><img width="100"
                                src="{{ url('storage/' . $item->img) }}" /></td>
                    <td>{{ $item->url }}</td>
                    <td class="table-action">
                        <a href="{{ url('/admin/CustmerSlide/' . $item->id) }}"><i
                                class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel({{ $item }}))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>

        <script>
            function showModel(e) {

                return `<form method='POST' 
        
        action='{{ url('/admin/CustmerSlide/${e.id}') }}' >
        @method('DELETE')
        @csrf
        <div class='formLaple' >
            <label> هل انت متأكد من حذف العنصر</label>
            <h3>${e.url}</h3>
            <button type='submit' class='btn btn-Danger' >حذف</button>
        </div>
        </form>`

            }
        </script>

        <x-model-box></x-model-box>
    </x-admin-contaner>
</x-admin-layout>
