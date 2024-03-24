<x-admin-layout>

    <h3> المهام </h3>
    <hr>
    <x-admin-contaner>

        <x-card-message />


        </div>

        <div class="mb-3 w-25 p-2 ">


            <label class="form-label"> اختر نوع السجلات </label>
            <select class="form-select select2 select2-hidden-accessible" id="type">
                @foreach ($NotifyType as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
<br>
            <button onclick="goToPage()" class="btn btn-success btn-sm ms-3 ">عرض</button>
        </div>
        <script>
            function goToPage() {
                let type = document.getElementById('type');
                window.location.href = '/admin/showMyNotifyTask/' + type.value;

            }
        </script>
        <hr>
        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">

                <tr>

                    <th>#</th>
                    <th>الرقم</th>
                    <th>الاسم</th>
                    <th> تاريخ الاصدار </th>
                    <th>الصلاحية </th>
                    <th>تاريخ الانتهاء </th>
                    <th>عرض </th>

                </tr>

            </thead>


            @foreach ($alltask as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->issueAt }}</td>
                    <td>{{ $item->duration }}</td>
                    <td>{{ $item->exp }}</td>
                    <td class="table-action">
                        <a href="{{ route('admin.editMyNotifyTask' , $item->id ) }}"><i class="mdi mdi-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $alltask->links('admin.pagination.custom') }}



        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>
