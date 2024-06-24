<x-admin-layout>

    <h3>تنبيهات السجلات </h3>

    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>
        <div class="page-title p-1" >
            <a href="{{ route('admin.NotifyType.create') }}" class="btn btn-success"> اضافة تصنيف</a>

        </div>

        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>

                    <th>#</th>
                    <th>اسم السجلات</th>
                    <th> التحكم</th>
                </tr>
            </thead>


            @foreach ($tasks as $item)
                <tr>
                    <td>{{ $item->id }}</td>

                    <td>
                        <a href="{{ route('admin.TasksNotify.edit' , $item->id) }}">

                            {{ $item->name }}
                        </a>

                    </td>

                    <td class="table-action">
                        <a href="{{ route('admin.NotifyType.edit' , $item->id ) }}"><i
                                class="mdi mdi-pencil"></i></a>
                                <br>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.NotifyType.destroy' , $item->id) }}'))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>

                </tr>
            @endforeach

        </table>



    </x-admin-contaner>
    <x-model-box></x-model-box>

</x-admin-layout>
