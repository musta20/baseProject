@extends('admin.layout.index')
@section('content')
    <section class="list border">
        <div class="controller">
            <x-card-message></x-card-message>

            <div class="orderDitels">
                <table>
                    <tr>
                        <td> مقدم الطلب </td>
                        <td>{{ $order->name }}</td>
                    </tr>
                    <tr>
                        <td> البريد الالكتروني </td>
                        <td>{{ $order->email }}</td>
                    </tr>
                    <tr>
                        <td> رقم الجوال </td>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <td> تاريخ الطلب </td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                    <tr>
                        <td> بيانات الطلب </td>
                        <hr />
                    </tr>
                    <tr>
                        <td>عنوان الطلب </td>
                        <td>{{ $order->title }}</td>
                    </tr>
                    <tr>
                        <td> وصف الطلب </td>
                        <td>{{ $order->des }}</td>
                    </tr>
                    <tr>
                        <td> طريقة الاستلام </td>
                        <td>{{ $order->receipt }}</td>
                    </tr>
                    <tr>
                        <td> طريقة الدفع </td>
                        <td>{{ $order->cash }}</td>
                    </tr>
                    <tr>
                        <td> تاريخ التسليم </td>
                        <td>{{ $order->time }}</td>
                    </tr>
                    <tr>
                        <td> المبلغ المستحق </td>
                        <td>{{ $order->price }}</td>
                    </tr>
                    <tr>
                        <td> المبلغ المدفوع </td>
                        <td>{{ $order->payed }}</td>
                    </tr>
                    <tr>
                        <td> المبلغ المتبقي </td>
                        <td>{{ $order->still }}</td>
                    </tr>
                    <tr>
                        <td> حالة الطلب </td>
                        <td>{{ $order->status_order }}</td>
                    </tr>






                </table>

                <form method="POST" action="{{ url('/admin/Order/' . $order->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="formLaple">
                        <label> تغيير حالة الطلب</label>
                        <select class="form-input" name="status">
                            @switch($order->status)
                                @case('0')
                                    <option value="0">قيد الانتظار</option>
                                    <option value="1">جاري العمل عليه</option>
                                    <option value="2">جاهز للتسليم</option>
                                    <option value="3">تم التسليم</option>
                                    <option value="4">ملغي</option>
                                @break
                                @case('1')
                                    <option value="1">جاري العمل عليه</option>
                                    <option value="2">جاهز للتسليم</option>
                                    <option value="3">تم التسليم</option>
                                    <option value="4">ملغي</option>
                                @break

                                @case('2')
                                    <option value="2">جاهز للتسليم</option>
                                    <option value="3">تم التسليم</option>
                                    <option value="4">ملغي</option>
                                @break

                                @case('3')
                                    <option value="3">تم التسليم</option>
                                    <option value="4">ملغي</option>
                                @break

                                @case('4')
                                <option value="4">ملغي</option>
             
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
                    <div class="formLaple">
                        <label> تغيير حالة الدفع</label>
                        <select onchange="selectpay(this)" class="form-input">
                            @if($order->still)
                            <option value="1"> تم دفع جزء من المبلغ </option>
                            <option value="0"> تم دفع كامل المبلغ</option>
                                @elseif(!$order->still)
                            <option value="0"> تم دفع كامل المبلغ</option>
                            <option value="1"> تم دفع جزء من المبلغ </option>
                                @endif
                             </select>
    
                         
    
                        </div>
                        <br>
                    <br>
                    <div class="formLaple">
                        @if($order->still)
                            <input class="form-input"   
                            id="payed"                         
                            placeholder="المبلغ "
                            
                             name="cost" type="number" />

                             @elseif(!$order->still)

                        <input class="form-input"   
                        id="payed"  
                        hidden                       
                        placeholder="المبلغ "
                         name="cost" type="number" />
                        @endif



                        @error('cost')
                            <span class="helper">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>
                    <br>
                    
                    <div class="formLaple">
                        <label> تغيير تاريخ التسليم </label>

                        <input class="form-input" name="time" type="date" />
                        @error('time')
                            <span class="helper">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>
                    <br><br>

                    <div>
                        <button class="btn btn-Primary">قبول</button>

                    </div>

                    <div>

                        <button class="btn btn-Danger">رفض</button>
                    </div>


            </div>



            </form>
        </div>
        <script>

            function selectpay(t) {
                console.log(t)
                const payed = document.getElementById('payed');

                if(t.value==1 || t.value==2){
                    payed.hidden = false;
                }else{
                //    payed.hidden = true;

                }

                //payed.diplay="true"

            }
        
    </script>
    </section>
@endsection
