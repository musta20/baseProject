<x-admin.layout>
    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>تتبع الموظف:{{ $user->name }}</h3>
            </span>
            <x-admin.select-input :selected="$user->id" onchange="goToUser()" id="users" label="اختر الموظف" :options="$users" />
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

            document.location = '/admin/logsList/' + users.value;
        }
    </script>

</x-admin.layout>

{{--

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
                    <th>قسم الاجراء</th>
                    <th>نوع الاجراء</th>
                    <th>التاريخ</th>
                    <th>عرض</th>
                </tr>
            </thead>
            @foreach ($AllLogs as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ __($item->log_name) }}</td>
                <td>{{ __($item->description) }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ route('admin.Logs.show',$item->id) }}">عرض</a>
                </td>
            </tr>
        @endforeach
        </table>
        {{ $AllLogs->links('admin.pagination.custom') }}

        <script>
            function showModel(name,id) {

            }

            function goToUser() {
                // console.log('use');
                const users = document.getElementById('users')
                document.location = '/admin/logsList/' + users.value;
            }
        </script>

        <x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout> --}}
