<x-admin.layout>
    <div class="px-5  pt-5">
        <form method="POST" action="{{ route('admin.admin.editTask' , $task->id) }}">
            @csrf
            <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600"> إضافة خدمة جديدة</span>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    حفظ التغييرات</button>
            </div>
            <div class="flex gap-2">
                <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">
                    <form class=" mx-5">
                        <div class="flex gap-3 w-full">


                        <x-admin.select-input :selected="$task->isdone"
                                :options="$option" name="status" label="تعديل حالة المهمة" />
                        </div>

                        <div class="flex gap-3 w-full   ">
                            <div class="flex gap-5 p-3 text-slate-800 ">
                                <span>مسندة الى:</span>
                                <span>
                                    {{ $task->user->name }}
                                </span>
                            </div>

                            <div class="flex gap-5 p-3 text-slate-800 ">
                                <span> تاريخ الانشاء:</span>
                                <span>
                                    {{ $task->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>

                        <div class="flex gap-3 w-full   ">
                            <div class="flex gap-5 p-3 text-slate-800 ">
                                <span> حالة المهمة:</span>
                                <span>
                                    {{ __('messages.'.$option[$task->isdone]->name) }}
                                </span>
                            </div>

                            <div class="flex gap-5 p-3 text-slate-800 ">
                                <span> تاريخ التحديث:</span>
                                <span>
                                    {{ $task->updated_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>

                        <div class="flex gap-5 p-3 text-slate-800 ">
                            <span> التفاصيل:</span>
                            <span>
                                {{ $task->des }}
                            </span>
                        </div>
                    </form>
                </div>
                <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">
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

                </div>

            </div>


        </form>
    </div>











    </x-admin-layout>