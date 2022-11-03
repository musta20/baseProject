@extends('admin.layout.index')
@section('content')
    <section class="list border">
        <div class="controller">
            <x-card-message></x-card-message>

            <div class="orderDitels">
                <table>
                    <tr>
                        <td> مقدم الطلب </td>
                        <td>{{ $client->name }}</td>
                    </tr>
                    <tr>
                        <td>  التعليق </td>
                        <td>{{ $client->des }}</td>
                    </tr>
                    <tr>
                        <td> التقييم </td>
                        <td>{{ $client->rate }}</td>
                    </tr>

                    <tr>
                        <td> الحالة </td>
                        <td>{{ $client->status }}</td>
                    </tr>
                    <tr>
                        <td> تاريخ التقييم </td>
                        <td>{{ $client->created_at }}</td>
                    </tr>
                    <tr>
                        <td> بيانات الطلب </td>
                        <hr />
                    </tr>
                    <tr>
                </table>

                <form method="POST" action="{{ url('/admin/Clients/' . $client->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="formLaple">
                        <label> تغيير حالة الطلب</label>
                        <select class="form-input" name="status">
                            @switch($client->status)
                                @case('1')
                                    <option value="1">غير ظاهر </option>
                                    <option value="2"> تم العرض</option>
                                @break

                                @case('2')
                                    <option value="2"> تم العرض</option>

                                    <option value="1">غير ظاهر </option>
                                @break

                                @default
                                    <span class="status">Trash</span>
                            @endswitch


                        </select>

                        @error('status')
                            <span class="helper">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>
                    <br>




                    <div>
                        <button class="btn btn-Primary">قبول</button>

                    </div>


            </div>



            </form>
        </div>
        <script>
            function selectpay(t) {
                console.log(t)
                const payed = document.getElementById('payed');

                if (t.value == 1 || t.value == 2) {
                    payed.hidden = false;
                } else {
                    //    payed.hidden = true;

                }

                //payed.diplay="true"

            }
        </script>
    </section>
@endsection
