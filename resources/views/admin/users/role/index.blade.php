<x-admin-layout>
    <h3>الموظفين</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />

        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم </th>
                    <th>التحكم</th>
                </tr>
            </thead>
            @foreach ($role as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{__($item->name) }}</td>
                    <td class="table-action">
                        <a onclick="OpenDeleteModel(showModel('{{ $item->NAME }}','{{ route('admin.removerole.destroy' , $item->id) }}'))" href="#"><i
                                class="mdi  mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        <hr>
        <form method="POST" class="p-1 w-75" action="{{ route('admin.addrole') }}">
            @csrf
            <h3>إضافة </h3>
            <hr>
            <div class="mb-3">
                <label class="form-label"> الاسم</label>
                <input class="form-control" name="role" placeholder="الاسم" />
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror


                <div class="mb-3 p-1">

                    <div class="px-3 pb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-send me-1"></i> حفظ</button>

                        <a type="button" href="{{ url('admin/indexrole') }}" class="btn btn-light">الغاء</a>
                    </div>
                </div>

        </form>

        </div>

   

        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>
