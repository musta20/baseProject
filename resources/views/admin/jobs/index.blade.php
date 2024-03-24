<x-admin-layout>
    <h3> الوظائف</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />
        <div class="page-title p-1">

            <a href="{{ route('admin.Jobs.create') }}" class="btn btn-success">إضافة وظيفة</a>
        </div>
        </div>
        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>المسمى الوظيفي</th>
                    <th>الوصف الوظيفي</th>
                    <th>مقر الوظيفة</th>
                </tr>
            </thead>
            @foreach ($alljobs as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->des }}</td>
                    <td class="table-action">
                        <a href="{{ route('admin.Jobs.index' , $item->id) }}"><i class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel('{{$item->title}}','{{route('admin.Jobs.destroy',$item->id)}}'))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $alljobs->links('admin.pagination.custom') }}




        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>