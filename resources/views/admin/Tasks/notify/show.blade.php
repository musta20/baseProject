<x-admin-layout>

    <h3> السجلات </h3>

    <hr>
    <x-admin-contaner>

        <x-card-message />
        <div class=" p-1">

            <a href="{{ url('/admin/TasksNotify/create') }}" class="btn btn-success"> اضافة سجل</a>


        </div>

        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>

                    <th>#</th>
                    <th>الاسم</th>
                    <th>الرقم</th>
                    <th>تاريخ الاصدار </th>
                    <th>مدة التجديد </th>
                    <th> التحكم </th>

                </tr>
            </thead>


            @foreach ($alltask as $item)
                <tr>
                    <td>{{ $item->id }}</td>

                    <td>{{ $item->name }}</td>

                    <td>{{ $item->number }}</td>

                    <td>{{ $item->issueAt }}</td>

                    <td>{{ $item->duration }}</td>

                    <td class="table-action">
                        <a href="{{ url('/admin/TasksNotify/' . $item->id . '/edit') }}"><i
                                class="mdi mdi-pencil"></i></a>
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
        
        action='{{ url('/admin/TasksNotify/${e.id}') }}' >
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
