<x-admin.layout>
    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>التتبع :</h3>
            </span>
            <x-admin.select-input  onchange="goToUser()" id="users" label="اختر الموظف" :options="$users" />
        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            {!! $filterBox !!}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            قسم الاجراء</th>
                            <th scope="col" class="px-6 py-3">
                                نوع الاجراء</th>

                            <th scope="col" class="px-6 py-3">
                                التاريخ </th>
                        <th scope="col" class="px-6 py-3">عرض</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($AllLogs as $item)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td scope="col" class="px-6 py-3">
                            {{ $item->log_name }}</td>

                            <td scope="col" class="px-6 py-3">
                                {{ $item->description }}</td>

                            <td scope="col" class="px-6 w-3/5 py-3">
                                {{ $item->created_at }}</td>
                        <td scope="col" class="gap-2 flex px-6 py-3">
                            <a href="{{ route('admin.Logs.show' , $item->id) }}">
                                عرض</a>
                            <br>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $AllLogs->links() }}

        </div>
    </div>
    <script>
        
        function goToUser() {
            const users = document.getElementById('users')

            document.location = '/admin/LogsList/' + users.value;
        }
    </script>

</x-admin.layout>


