<x-admin-layout>
    <h3> التصنيفات </h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />
        <div class="page-title p-1">

            <form method="POST" class="w-75" action="{{ url('admin/search') }}">
                @csrf
                <div class="mb-3">
                    <div class="app-search dropdown">
                        <div class="input-group">
                            <input type="search" class="form-control dropdown-toggle w-50" placeholder="ادخل الرقم"
                                name="keyword" id="top-search">
                            <select name="type" class="form-select select2 select2-hidden-accessible  ">
                                <option value="1">الطلبات</option>
                                <option value="2">طلبات التوظيف</option>
                                <option value="3">الفواتير</option>
                            </select>
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text btn btn-primary" type="submit">بحث</button>
                        </div>
                    </div>
                    <br>
                    @isset($resault)
                        <div class="alert alert-warning" role="alert">
                            <strong>
                                لا يوجد بيانات حسب القيم المدخلة
                            </strong>
                        </div>
                        {{-- @switch($type)
                            @case(1)
                                <x-admin-order-search :resault=$resault />
                            @break

                            @case(2)
                                <x-admin-job-search :resault=$resault />
                            @break

                            @case(2)
                                <x-admin-bill-search :resault=$resault />
                            @break

                            @default 
                        @endswitch
                        --}}
                    @endisset
                </div>
        </div>

        {{--   <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            @foreach ($allcategory as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>

                    <td class="table-action">
                        <a href="{{ url('/admin/Category/' . $item->id) }}">
                            <i class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel({{ $item }}))" href="#">
                            <i class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $allcategory->links('admin.pagination.custom') }}


        <script>
            function showModel(e) {

                return `<form method='POST' 
        
        action='{{ url('/admin/Category/${e.id}') }}' >
        @method('DELETE')
        @csrf
        <div class='formLaple' >
            <label> هل انت متأكد من حذف العنصر</label>
            <h3>${e.title}</h3>
            <button type='submit' class='btn btn-Danger' >حذف</button>
        </div>
        </form>`

            }
        </script>
 --}}
        <x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout>
