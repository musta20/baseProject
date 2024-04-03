<x-admin.layout>
    <div class="px-5  pt-5">
        <div method="POST" >
            @csrf
            <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600"> اضافة وظيفة</span>
                <a type="submit" href="{{ route('admin.inbox',2) }}"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    عودة</a>
            </div>
            <div class=" p-3 bg-slate-100 rounded-md border border-gray-300 ">
                <form class="mx-auto w-1/2 "  method="POST" action="{{ route('admin.Jobs.store') }}">
                    @csrf

                    {{--
                    <x-admin.input-card name="email" label="البريد الالكتروني" /> --}}


                    <div class=" p-3 text-slate-800 ">
                        <x-admin.input-card label="المسمى الوظيفي" value="{{ old('title') }}"  placeholder="المسمى الوظيفي" name="title"  />
                    </div>

                    <div class=" p-3 text-slate-800 ">
                        <x-admin.select-input label="مقر الوظيفة" :options="$jobCity" name="job_cities_id"  />
                    </div>

                    <span>
                        <x-admin.textarea-card name="des" placeholder="التفاصيل" label="الوصف" />

                    </span>

                    <hr>
                    <button type="submit" 
                        class="bg-blue-500 my-4 flex gap-2 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                       
                          
                        حفظ</button>
                </form>


            </div>


        </div>
    </div>


</x-admin.layout>
