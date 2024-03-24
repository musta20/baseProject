<x-admin-layout>
    <h3>روابط التواصل</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />

        <div class="page-title p-1">

            <a href="{{ route('admin.Social.create') }}" class="btn btn-success">إضافة رابط</a>

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
            @foreach ($allsocial as $item)
                <tr>
                    <td>{{ $item->id }}</td>

                    <td><i class="{{ $item->img }}"></i></td>
                    <td>{{ $item->url }}</td>

                    <td class="table-action">

                        <a href="{{ route('admin.Social.edit' , $item->id) }}">
                            <i class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->url }}','{{ route('admin.Social.destroy' , $item->id) }}'))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>



        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>
