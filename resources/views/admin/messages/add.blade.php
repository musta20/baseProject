<x-admin.layout>
    <div class="px-5  pt-5">
        <div method="POST" >
            @csrf
            <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600"> إنشاء الرسالة</span>
                <a type="submit" href="{{ route('admin.inbox',2) }}"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    عودة</a>
            </div>
            <div class=" p-3 bg-slate-100 rounded-md border border-gray-300 ">
                <form class="mx-auto w-1/2  " method="POST" action="{{ route('admin.Messages.store') }}">
                    @csrf

                    {{--
                    <x-admin.input-card name="email" label="البريد الالكتروني" /> --}}


                    <div class=" p-3 text-slate-800 ">
                        <x-admin.select-input dir="rtl" label="الى" name="to" :options="$Users" />
                    </div>

                    <div class=" p-3 text-slate-800 ">
                        <x-admin.input-card label="عنوان الرسالة" placeholder="عنوان الرسالة" name="title" />

                    </div>



                    <span>
                        <x-admin.textarea-card name="message" placeholder="التفاصيل" label="التفاصيل" />

                    </span>

                    <hr>
                    <button type="submit"
                        class="bg-blue-500 my-4 flex gap-2 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                          </svg>

                        ارسال</button>
                </form>


            </div>


        </div>
    </div>


</x-admin.layout>