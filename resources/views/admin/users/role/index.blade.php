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
                    <td>{{ $item->name }}</td>
                    <td class="table-action">
                        <a onclick="OpenDeleteModel(showModel({{ $item }}))" href="#"><i
                                class="mdi mdi-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        <hr>
        <form method="POST" class="p-1 w-75" action="{{ url('/admin/addrole') }}">
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

        <script>
            function showModel(e) {

                return `<form method='POST' 
        
        action='{{ url('admin/rmrole/${e.id}') }}' >
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
