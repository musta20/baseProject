<x-admin-layout>
    <h3>تقارير الطلبات</h3>
    <hr>
    <x-admin-contaner>

        <form method="POST" target="_blank" class="D-flex w-25" action="{{ url('/admin/Report') }}">
            @csrf

            <input hidden name="reporttype" value="order" />

            <div class="mb-3">
                نوع التقرير
                <select class="form-select select2 select2-hidden-accessible" name="type">
                    <option value="6">عام</option>
                    <option value="0">قيد الانتظار</option>
                    <option value="1"> تحت المعالجة</option>
                    <option value="2">المكتملة</option>
                    <option value="3">المستلمة</option>
                    <option value="4">ملغي</option>
                </select>

            </div>

            <div class="mb-3">
                <label class="form-lable">من</label>
                <input class="form-control" type="date" name="from" />

                @error('from')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-lable"> الى</label>

                <input class="form-control" type="date" name="to" />

                @error('to')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>




            <div class="mb-3">
                <label></label>
                <button class="btn btn-primary">عرض</button>
            </div>
        </form>
        <x-card-message />


        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">            
                <tr>
                <th>#</th>
                <th>نوع التقرير</th>
                <th>تاريخ التقرير</th>
                <th> من</th>
                <th>الى </th>
                <th> التحكم</th>
            </tr>
            </thead>
            @foreach ($orderReport as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        @switch($item->type)
                            @case(0)
                                قيد الانتظار
                            @break

                            @case(1)
                                جاري العمل عليه
                            @break

                            @case(2)
                                جاهز للتسليم
                            @break

                            @case(3)
                                تم التسليم
                            @break

                            @case(6)
                                عام
                            @break

                            @case(4)
                                ملغي
                            @break

                            @default
                        @endswitch

                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->from }}</td>
                    <td>{{ $item->to }}</td>
                    <td class="cellControll">
                        <a target="_blank" href="{{ url('storage/pdf/' . $item->file) }}"><i
                                class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel({{ $item }}))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $orderReport->links('admin.pagination.custom') }}

        <script>
            function showModel(e) {

                return `<form method='POST' 
        
        action='{{ url('/admin/Report/${e.id}') }}' >
        @method('DELETE')
        @csrf
        <div class='formLaple' >
            <label> هل انت متأكد من حذف العنصر</label>
            <h3>${e.id}</h3>
            <button type='submit' class='btn btn-Danger' >حذف</button>
        </div>
        </form>`

            }
        </script>

        <x-model-box></x-model-box>
    </x-admin-contaner>
</x-admin-layout>
