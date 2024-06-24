<x-admin.layout>
    <div class="px-5  pt-5">
        <div >
            @csrf
            <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">     <h3> عرض العملية</h3>
                </span>

            </div>
            <div class="flex gap-2">
                <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">
                    <div class=" mx-5">


                        <div class="flex gap-3 w-full   ">
                            <div class="flex gap-5 p-3 text-slate-800 ">
                                <span> اسم الاجراء:</span>
                                <span>
                                    {{ $log->log_name }}
                                </span>
                            </div>

                            <div class="flex gap-5 p-3 text-slate-800 ">
                                <span> تاريخ الانشاء:</span>
                                <span>
                                    {{ $log->created_at }}
                                </span>
                            </div>
                        </div>

                        <div class="flex gap-3 w-full   ">
                            <div class="flex gap-5 p-3 text-slate-800 ">
                                <span>  بيانات العملية:</span>
                                <span>
                                    {{ json_encode($log->properties,  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) }}
                                </span>
                            </div>

                        </div>

                    </div>
                </div>


            </div>


        </div>
    </div>







</x-admin.layout>