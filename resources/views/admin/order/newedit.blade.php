<x-admin.layout>
    <div class="px-5 text-slate-700 pt-5">
        <form method="POST" action="{{ route('admin.Order.update' , $order->id) }}">
            @csrf
            @method('PUT') <div
                class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex !text-slate-600"> تحديث الطلب</span>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    حفظ التغييرات</button>
            </div>
            <div class="flex gap-2">
                <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">
                    <div class="flex gap-3   ">
                        <div class="mb-5 w-1/2">
                            <x-admin.select-input name="status" :selected="$order->still ? 1:0" :options="$PayStatus"
                                label="حالة الدفع" />

                        </div>
                        <div class="mb-5 w-1/2">

                            <x-admin.select-input name="isdone" :selected="$order->status" :options="$statusOrder"
                                label="حالة الطلب" />
                        </div>
                    </div>

                    <div class="flex gap-3   ">
                        <div class="mb-5 w-1/2">
                            <x-admin.input-card value="{{ $order->time }}" name="time" type="date"
                                label=" تاريخ التسليم المتوقع" />

                        </div>
                        <div class="mb-5 w-1/2">
                            @if ($order->still)

                            <x-admin.input-card name="cost" id="payed" placeholder="المبلغ " label="اضافة مبلغ مدفوع" />
                            @elseif(!$order->still)
                            <x-admin.input-card name="cost" id="payed" hidden placeholder="المبلغ "
                                label="اضافة مبلغ مدفوع" />

                            @endif



                        </div>
                    </div>





                    <div class="flex gap-3 w-full">
                        <div class="mb-5 w-1/2">
                            <label class="px-1 py-2 text-sm font-bold">العنوان: </label>
                            <br>
                            {{ $order->title }}
                        </div>
                        <div class="mb-5 w-1/2">
                            <label class="px-1 py-2 text-sm font-bold">الاسم: </label>
                            <br>

                            {{ $order->name }}
                        </div>
                    </div>





                    <div class="flex gap-3   ">
                        <div class="mb-5 w-1/2">
                            <label class="px-1 py-2 text-sm font-bold"> اشراف الموظف:: </label>
                            <br>
                            {{ $order->user->name ?? 'عير محدد' }}

                        </div>
                        <div class="mb-5 w-1/2">
                            <label class="px-1 py-2 text-sm font-bold">تاريخ الطلب: </label>
                            <br>

                            {{ $order->created_at->diffForHumans() }}

                        </div>
                    </div>

                    <div class="mb-5 w-full">
                        <label class="px-1 py-2 text-sm font-bold">التفاصيل : </label>
                        <br>

                        <br>{{ $order->des }}
                    </div>








                </div>
                <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">
                    <div class="px-2 py-3">


           

                    <div class="flex gap-3   ">
                        <div class="mb-5 w-1/2">
                            <label class="px-1 py-2 text-sm font-bold"> رقم الهاتف: </label>
                            <br>

                            {{ $order->phone }}
                        </div>
                        <div class="mb-5 w-1/2">
                            <label class="px-1 py-2 text-sm font-bold"> طريقة التوصيل: </label>
                            <br>

                            {{ $order->delivery->name }}
                        </div>
                    </div>


                    <div class="flex gap-3   ">
                        <div class="mb-5 w-1/2">
                            <label class="px-1 py-2 text-sm font-bold"> العدد </label>

                            <br>
                            {{ $order->count }}
                        </div>
                        <div class="mb-5 w-1/2">
                            <label class="px-1 py-2 text-sm font-bold"> طريقة الدفع: </label>
                            <br>

                            {{ $order->payment->name }}
                        </div>
                    </div>



                    <div class="flex gap-3   ">
                        <div class="mb-5 w-1/2">
                            <label class="px-1 py-2 text-sm font-bold"> تاريخ الاعنماد : </label>
                            @if($order->approve_time)
                            {{$order->approve_time}}
                            @else
                            غير محدد
                            @endif
                        </div>
                        <div class="mb-5 w-1/2">
                            <label class="px-1 py-2 text-sm font-bold"> المبلغ المستحق</label>
                            {{ $order->price }}
                        </div>
                    </div>



                    <div class="flex gap-3   ">
                        <div class="mb-5 w-1/2">
                            <label class="px-1 py-2 text-sm font-bold"> المبلغ المدفوع: </label>
                            {{ $order->payed }}
                        </div>
                        <div class="mb-5 w-1/2">
                            <label class="px-1 py-2 text-sm font-bold"> المبلغ المتبقي </label>

                            {{ $order->still }}
                        </div>
                    </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">المرفقات</h5>
                                <!-- Preview -->
                                <div class="dropzone-previews mt-3" id="file-previews"></div>

                                <!-- file preview template -->
                                @php
                                $files = [];
                                @endphp
                                <!-- end file preview template -->
                                @if(!count($files))
                                لايوجد مرفقات
                                @endif

                                @foreach ($files as $key => $item)
                                <br>
                                <a target="_blank" href="{{ url('/storage/' . $item->name) }}">
                                    ملف {{ $key }}
                                </a>
                                <div class="card my-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title rounded">
                                                        .ZIP
                                                    </span>
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

            </div>


        </form>
    </div>
</x-admin.layout>