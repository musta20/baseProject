<x-admin-layout>
    <h3>المدن</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />
        <div class="page-title p-1">
            <a href="{{ url('/admin/JobCity/create') }}" class="btn btn-success">إضافة مدينة</a>
        </div>
        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            @foreach ($jobcity as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="cellControll">
                        <a href="{{ url('/admin/JobCity/' . $item->id) }}">
                            <i class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.JobCity.destroy' , $item->id) }}'))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $jobcity->links('admin.pagination.custom') }}



        <x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout>
