@extends('admin.layout.index')
@section('content')
    <section class="list border">
        <div class="controller">
            <h3> الفواتير المصدرة</h3>
            <form method="GET" class="D-flex" action="{{ url('/admin/billReport') }}">
                <div class="formLaple">
                    نوع الفاتورة
                    <select class="form-input" name="type">
                        <option value="0">  فاتورة زبون </option>
                        <option value="1">  فاتورة داخلية</option>
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
                <th>رقم الفاتورة</th>
                <th>نوع الفاتورة</th>
                <th>تاريخ الفاتورة</th>
                <th> اسم العميل</th>
                <th> التحكم</th>
            </tr>
            @foreach ($orderReport as $item)
                <tr>
                    <td>#{{ sprintf('%04d', $item->id)}}</td>
                    <td>
                        @switch($item->type)
                            @case(0)
                                فاتورة زبون 
                            @break

                            @case(1)
                                فاتورة داخلية
                            @break
                            @default
                        @endswitch

                    </td>
                    <td>{{ $item->created_at }}</td>
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
