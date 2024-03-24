<x-admin-layout>

    <h3>روابط التواصل</h3>
    <hr>

    <x-admin-contaner>


        <x-card-message />
        <div class="page-title p-1">

            <a href="{{ route('admin.Number.create') }}" class="btn btn-success">إضافة رابط</a>

        </div>

        </div>
        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">            
                <tr>
                <th>#</th>
                <th>الصورة</th>
                <th>النص</th>
                <th>الرقم</th>
                <th>التحكم</th>
            </tr>
            </thead>
            @foreach ($allnumbers as $item)
                <tr>
                    <td>{{ $item->id }}</td>

                    <td>{{ $item->img }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->number }}</td>

                    <td class="table-action">

                        <a href="{{ route('admin.Number.edit' , $item->id) }}">
                            <i class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Number.destroy' , $item->id) }}'))" href="#">
                            <i class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>


        <x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout>
