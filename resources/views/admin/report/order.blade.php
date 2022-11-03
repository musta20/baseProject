@extends('admin.layout.index')
@section('content')
    <section class="list border">
        <div class="controller">
            <h3>تقارير الطلبات</h3>
            <form method="POST" target="_blank" class="D-flex" action="{{ url('/admin/Report') }}">
                @csrf

                <input hidden name="reporttype" value="order" />

                <div class="formLaple">
                    نوع التقرير
                    <select class="form-input" name="type">
                        <option value="6">عام</option>
                        <option value="0">قيد الانتظار</option>
                        <option value="1"> تحت المعالجة</option>
                        <option value="2">المكتملة</option>
                        <option value="3">المستلمة</option>
                        <option value="4">ملغي</option>
                    </select>

                </div>

                <div class="formLaple">
                    <label>من</label>
                    <input class="form-input" type="date" name="from" />

                    @error('from')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>
                <div class="formLaple">
                    <label> الى</label>

                    <input class="form-input" type="date" name="to" />

                    @error('to')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>




                <div class="formLaple">
                    <label></label>
                    <button class="btn btn-Dark">عرض</button>
                </div>
            </form>
            <x-card-message />


        </div>
        <table>
            <tr>
                <th>#</th>
                <th>نوع التقرير</th>
                <th>تاريخ التقرير</th>
                <th> من</th>
                <th>الى </th>
                <th> التحكم</th>
            </tr>
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
                                class="fa-regular fa-pen-to-square"></i></a>
                        <a onclick="OpenDeleteModel(showModel({{ $item }}))" href="#"><i
                                class="fa-sharp fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $orderReport->links('admin.pagination.custom') }}
    </section>
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
@endsection
