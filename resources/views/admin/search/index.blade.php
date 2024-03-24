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

        <x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout>
