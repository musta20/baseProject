<x-admin.layout>


    <div class="px-5  pt-5">

        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
           
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600" > إضافة خدمة جديدة</span>
            <button
            class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"
            > حفظ التغييرات</button>
        </div>


        <div class="flex gap-2">
            <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">

                <form class=" mx-5">
                    
                    <div class="flex gap-3 w-full">

                    <x-admin.input-card name="email" label="البريد الالكتروني" />
                    <x-admin.input-card placeholder='ادخل كلمة المرور' name="password" type="password" label="كلمة المرور" />

               

                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        حفظ التغييرات</button>
                </form>

            </div>

            <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">
                <form class=" mx-5">

                    <x-admin.textarea-card name="title" label="عنوان الخدمة" />

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                     focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center
                      dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
                        new account</button>
                </form>

            </div>
        </div>
    </div>

</x-admin.layout>