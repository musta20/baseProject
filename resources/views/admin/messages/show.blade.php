<x-admin.layout>
    <div class="px-5  pt-5">
         <form method="POST" >
            @csrf
            <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600"> تفاصيل الرسالة</span>
                <a type="submit"
                    href="{{ route('admin.inbox',2) }}"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    عودة</a>
            </div>
                <div class=" p-3 bg-slate-100 rounded-md border border-gray-300 ">
                    <form class=" mx-5">
                    

                        <div class="flex gap-3 w-full   ">
                            <div class="flex gap-5 p-3 text-slate-800 ">
                                <span> المرسل:</span>
                                <span>
                                    {{ $message->fromUser->name }}
                                </span>
                            </div>

                            <div class="flex gap-5 p-3 text-slate-800 ">
                                
                            </div>
                        </div>

                        <div class="flex gap-3 w-full   ">
                            <div class="flex gap-5 p-3 text-slate-800 ">
                                <span> العنوان الرسالة:</span>
                                <span>
                                    {{ $message->title }}
                                </span>
                            </div>

                            <div class="flex gap-5 p-3 text-slate-800 ">
                                
                            </div>
                        </div>

                        <div class="flex gap-5 p-3 text-slate-800 ">
                            <span> التفاصيل:</span>
                            <span>
                                {{ $message->message }}

                            </span>
                        </div>


                    </form>


                {{-- <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">
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

                </div> --}}

            </div>


        </form>
    </div>


</x-admin.layout>

