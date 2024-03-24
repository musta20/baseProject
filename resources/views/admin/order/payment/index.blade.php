<x-admin-layout>

    <h3>طريق الدفع</h3>
    <hr>

    <x-admin-contaner>
        <x-card-message />
        <div class="page-title p-1">

            <a href="{{ route('admin.Payment.create') }}" class="btn btn-success">إضافة طريقة دفع</a>

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
                        <a href="{{ route('admin.Payment.edit' , $item->id) }}">
                            <i class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->name }}','{{ route('admin.Payment.destroy' , $item->id) }}'))" href="#">
                            <i class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $payment->links('admin.pagination.custom') }}


        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>
