<x-admin-layout>

    <h3>تتبع الموظف:{{ $name }}</h3>

    <hr>
    <x-admin-contaner>
        <x-card-message />

        <div class="mb-3 w-25">
            <label class="form-lable">اسم الموظف
            </label>
            <select class="form-select select2 select2-hidden-accessible" onchange="goToUser()" id="users"
                name="user">
                <option value="0">اختر اسم الموظف</option>

                @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <br />

        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>اسم الموظف</th>
                    <th>قسم الاجراء</th>
                    <th>نوع الاجراء</th>
                    <th>التاريخ</th>
                    <th>عرض</th>
                </tr>
            </thead>
            @foreach ($AllLogs as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->causer_id }}</td>
                    <td>{{ $item->log_name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="/admin/Logs/{{ $item->id }}">عرض</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $AllLogs->links('admin.pagination.custom') }}

        <script>
            function showModel(e) {

                return `<form method='POST' 
        
        action='{{ url('/admin/Order/${e.id}') }}' >
        @method('DELETE')
        @csrf
        <div class='formLaple' >
            <label> هل انت متأكد من حذف العنصر</label>
            <h3>${e.id}</h3>
            <button type='submit' class='btn btn-Danger' >حذف</button>
        </div>
        </form>`

            }

            function goToUser() {
                // console.log('use');
                const users = document.getElementById('users')
                document.location = '/admin/LogsList/' + users.value;
            }
        </script>

        <x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout>
