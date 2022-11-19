<x-admin-layout>

    <h3>طريق الدفع</h3>
    <hr>

    <x-admin-contaner>
        <x-card-message />
        <div class="page-title p-1">

            <a href="{{ url('/admin/Payment/create') }}" class="btn btn-success">إضافة طريقة دفع</a>

        </div>

        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            @foreach ($payment as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="table-action">
                        <a href="{{ url('/admin/Payment/' . $item->id) }}">
                            <i class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel({{ $item }}))" href="#">
                            <i class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $payment->links('admin.pagination.custom') }}


        <script>
            function showModel(e) {

                return `<form method='POST' 
        
        action='{{ url('/admin/Payment/${e.id}') }}' >
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
