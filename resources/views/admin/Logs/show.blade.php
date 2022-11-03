@extends('admin.layout.index')
@section('content')
    <section class="list border">
        <div class="controller">
            <h3>التتبع</h3>
            <x-card-message />
        </div>

        <br />

        <table>
            <tr>
                <th> اسم الاجراء</th>
                <td> {{ $log->log_name }}</td>
            </tr>
            <tr>
                <th> نوع الاجراء</th>
                <td> {{ $log->description }}</td>
            </tr>
            <tr>
                <th> تاريخ الاجراء</th>
                <td> {{ $log->created_at }}</td>
            </tr>
            <tr>
                <th> بيانات الاجراء</th>
                <td>
                    <pre>
                <code> {{ json_encode($log->properties, JSON_UNESCAPED_UNICODE) }}
                </code>
            </pre>
                </td>
            </tr>


        </table>
    </section>
    <script>
        function showModel(e) {
            return `
   <form method='POST' 
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

            const users = document.getElementById('users')

            document.location = '/admin/LogsList/' + users.value;
        }
    </script>
    <x-model-box></x-model-box>
@endsection
