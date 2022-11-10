<x-admin-layout>

    <h3> عرض العملية</h3>

    <hr>
    <x-admin-contaner>
        <x-card-message />



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
                <th>
                    بيانات الاجراء:
                </th>

            </tr>
            <tr>
                <td >
                    <pre dir="ltr"  id="json">
                     {{json_encode($log->properties,  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)}}


            </pre>
                </td>
            </tr>


        </table>
<a  class='btn btn-light' href="{{url('/admin/Logs')}}">عودة</a>
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


    </x-admin-contaner>
</x-admin-layout>
