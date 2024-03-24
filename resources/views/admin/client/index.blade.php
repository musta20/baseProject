<x-admin-layout>

    <h3>اراء العملاء </h3>

    <hr>
    <x-admin-contaner>
        <x-card-message />


        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>التعليق</th>
                    <th>التحكم</th>
                </tr>
            </thead>


            @foreach ($client as $item)
                <tr>
                    <td>{{ $item->id }}</td>


                    <td>{{ $item->name }}</td>

                    <td>{{ $item->des }}</td>

                    <td class="table-action">
                        <a href="{{ route('admin.Clients.edit' , $item->id ) }}"><i
                                class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel('{{$item->title}}','{{route('admin.Clients.destroy',$item->id)}}'))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $client->links('admin.pagination.custom') }}


  

        <x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout>
