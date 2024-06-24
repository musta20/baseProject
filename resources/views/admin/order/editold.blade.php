<x-admin-layout>
    <h3>بيانات الطلب</h3>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <div class="row">
            <x-card-message></x-card-message>
            <div class="col-xxl-8 col-xl-7">
                <form method="POST" action="{{ route('admin.Order.update' , $order->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card d-block">
                        <div class="card-body">
                            <div x-cloak class="dropdown card-widgets">
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-send me-1"></i> حفظ</button>
                            </div> <!-- end dropdown-->
                            <div class="form-check float-start">

                                <label class="form-label"> تغيير حالة الطلب</label>
                                <x-admin.select-input :option="$orderStatus" selected="$order->status" />
                                <select class="form-select select2 select2-hidden-accessible" name="status">
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
                                <br>

                                <label class="form-label"> تغيير حالة الدفع</label>
                                <select onchange="selectpay(this)"
                                    class="form-select select2 select2-hidden-accessible">
                                    @if ($order->still)
                                        <option value="1"> تم دفع جزء من المبلغ </option>
                                        <option value="0"> تم دفع كامل المبلغ</option>
                                    @elseif (!$order->still)
                                        <option value="0"> تم دفع كامل المبلغ</option>
                                        <option value="1"> تم دفع جزء من المبلغ </option>
                                    @endif
                                </select>



                                <br>
                                <label class="form-label"> تغيير تاريخ التسليم </label>

                                <input class="form-control" name="time" type="date" />
                                @error('time')
                                    <span class="helper">
                                        {{ $message }}
                                    </span>
                                @enderror

                                <br>
                                @if ($order->still)
                                    <label class="form-label"> اضافة مبلغ مدفوع</label>

                                    <input class="form-control" id="payed"
                                     placeholder="المبلغ " name="cost"
                                        type="number" />
                                @elseif (!$order->still)
                                    <label class="form-label"> اضافة مبلغ مدفوع</label>

                                    <input class="form-control" id="payed"
                                    hidden placeholder="المبلغ "
                                        name="cost" type="number" />
                                @endif
                                @error('cost')
                                    <span class="helper">
                                        {{ $message }}
                                    </span>
                                @enderror




                            </div> <!-- end form-check-->
                            <!-- end form-check-->
                            <div class="clearfix"></div>

                            <h3 class="mt-3">{{ $order->title }}</h3>

                            <div class="row">
                                <div class="col-6">
                                    <!-- assignee -->
                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase"> مقدم الطلب</p>
                                    <div class="d-flex">
                                        {{-- <img src="assets/images/users/avatar-9.jpg"
                            alt="Arya S" class="rounded-circle me-2" height="24"> --}}
                                        <div>
                                            <h5 class="mt-1 font-14">
                                                {{ $order->name }}
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->

                                <div class="col-6">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">تاريخ الانشاء</p>
                                    <div class="d-flex">
                                        <i class="uil uil-schedule font-18 text-success me-1"></i>
                                        <div>
                                            <h5 class="mt-1 font-14">
                                                {{ $order->created_at->isoFormat('dddd D') }}
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->


                            <div class="row">
                                <div class="col-6">
                                    <!-- assignee -->
                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">
                                        حالة الطلب </p>
                                    <div class="d-flex">
                                        {{-- <img src="assets/images/users/avatar-9.jpg"
                            alt="Arya S" class="rounded-circle me-2" height="24"> --}}
                                        <div>
                                            <h5 class="mt-1 font-14">
                                                <td>
                                                    {{ $order->status_order }}
                                                </td>
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <!-- assignee -->
                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">
                                        تاريخ التسليم المفضل </p>
                                    <div class="d-flex">
                                        <i class="uil uil-schedule font-18 text-success me-1"></i>
                                        <div>

                                            <h5 class="mt-1 font-14">

                                                <td>
                                                    @if (isset($order->time))
                                                        {{ $order->time }}
                                                    @else
                                                        عير محدد
                                                    @endif
                                                </td>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- end assignee -->
                            </div> <!-- end col -->

                            <h5 class="mt-3">التفاصيل:</h5>

                            <p class="text-muted mb-4">
                                {{ $order->des }}

                            </p>


                            <div class="row">
                                <div class="col-6">
                                    <!-- assignee -->
                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase"> الموظف </p>
                                    <div class="d-flex">
                                        {{-- <img src="assets/images/users/avatar-9.jpg"
                                alt="Arya S" class="rounded-circle me-2" height="24"> --}}
                                        <div>
                                            <h5 class="mt-1 font-14">
                                                {{ $order->user_id }}
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->

                                <div class="col-6">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">رقم الجوال </p>
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mt-1 font-14">
                                                {{ $order->phone }}
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-6">
                                    <!-- assignee -->
                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase"> طريقة الاستلام
                                    </p>
                                    <div class="d-flex">
                                        {{-- <img src="assets/images/users/avatar-9.jpg"
                                alt="Arya S" class="rounded-circle me-2" height="24"> --}}
                                        <div>
                                            <h5 class="mt-1 font-14">
                                                {{ $order->delivery->name }}
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->

                                <div class="col-6">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">طريقة الدفع </p>
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mt-1 font-14">
                                                {{ $order->payment->name }}
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->


                            <div class="row">
                                <div class="col-6">
                                    <!-- assignee -->
                                    <p class="mt-2 mb-1 text-muted fw-bold
                                    font-12 text-uppercase"> العدد </p>
                                    <div class="d-flex">
                                        {{-- <img src="assets/images/users/avatar-9.jpg"
                            alt="Arya S" class="rounded-circle me-2" height="24"> --}}
                                        <div>
                                            <h5 class="mt-1 font-14">
                                                {{ $order->count }}
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->

                                <div class="col-6">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-u
                                    ppercase"> تاريخ الاعنماد </p>
                                    <div class="d-flex">
                                        <i class="uil uil-schedule font-18 text-succe
                                        ss me-1"></i>
                                        <div>
                                            <h5 class="mt-1 font-14">
                                                @if ($order->approve_time)
                                                    {{ $order->approve_time }}
                                                @else
                                                    غير محدد
                                                @endif
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-6">
                                    <!-- assignee -->
                                    <p class="mt-2 mb-1 text-muted fw-bold font-
                                    12 text-uppercase"> المبلغ المستحق
                                    </p>
                                    <div class="d-flex">
                                        {{-- <img src="assets/images/users/avatar-9.jpg"
                                alt="Arya S" class="rounded-circle me-2" height="24"> --}}
                                        <div>
                                            <h5 class="mt-1 font-14">
                                                {{ $order->price }}
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->

                                <div class="col-6">
                                    <!-- start due date -->
                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 t
                                    ext-uppercase"> المبلغ المدفوع
                                    </p>
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mt-1 font-14">
                                                {{ $order->payed }}
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end due date -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-6">
                                    <!-- assignee -->
                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">
                                        المبلغ المتبقي </p>
                                    <div class="d-flex">
                                        {{-- <img src="assets/images/users/avatar-9.jpg"
                                alt="Arya S" class="rounded-circle me-2" height="24"> --}}
                                        <div>
                                            <h5 class="mt-1 font-14">
                                                {{ $order->still }}
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- end assignee -->
                                </div> <!-- end col -->

                            </div> <!-- end row -->


                        </div> <!-- end row -->





                        <!-- end card-body-->

                    </div> <!-- end card-->
                </form>
                <!-- end card-->
            </div> <!-- end col -->

            <div class="col-xxl-4 col-xl-5">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">المرفقات</h5>


                        <!-- Preview -->
                        <div class="dropzone-previews mt-3" id="file-previews"></div>

                        <!-- file preview template -->

                        <!-- end file preview template -->
                        @if (!count($files))
                            لايوجد مرفقات
                        @endif
                        @foreach ($files as $key => $item)
                            <br>
                            <a target="_blank" href="{{ url('/storage/' . $item->name) }}">
                            </a>
                            <div class="card my-1 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar-sm">

                                            </div>
                                        </div>
                                        <div class="col ps-0">
                                            <a target="_blank" href="{{ url('/storage/' . $item->name) }}"
                                                class="text-muted fw-bold">
                                                رقم ملف {{ $key }}
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                <i class="ri-download-2-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>



    </x-admin-contaner>
</x-admin-layout>
<script>
    function selectpay(t) {
        // console.log(t)
        const payed = document.getElementById('payed');

        if (t.value == 1 || t.value == 2) {
            payed.hidden = false;
        }
    }
</script>