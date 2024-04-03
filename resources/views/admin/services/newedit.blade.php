<x-admin.layout>
    <div class="px-5 text-slate-700 pt-5">
        <form method="POST" action="{{ route('admin.Services.update' , $services->id) }}">
            @csrf
            @method('PUT') <div
                class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex !text-slate-600"> تحديث الخدمة</span>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    حفظ التغييرات</button>
            </div>
            <div class="flex gap-2">
                <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">


                    <div class="flex gap-3   ">
                        <x-admin.select-input name="category_id" :selected="$services->category->id" :options="$cat"
                            label="التصنيف" />
                        <x-admin.input-card name="name" value="{{ $services->name }}" placeholder="عنوان الخدمة" label="عنوان الخدمة" />
                    </div>
                    <div class="flex gap-3 w-full">
                        <div class="mb-5 w-1/2">
                            <x-admin.input-card placeholder=" السعر" value="{{ $services->price }}" label="السعر" name="price" />
                        </div>
                        <div class="mb-5 w-1/2">

                        </div>
                    </div>




                    <div class="mb-5 gap-3 ">
                        <label> اضافة وسيلة توصيل</label>
                        <br>
                        <div class="flex gap-1   justify-items-center">
                            <x-admin.select-input name="status" id="devValue" :selected="$services->category->id" :options="$dev" />

                            <button class="bg-blue-500 h-10 hover:bg-blue-400
                            text-white font-bold py-2 px-4 border-b-4
                             border-blue-700 my-8 hover:border-blue-500 rounded" onclick="addDev(event)"> اضافة
                            </button>
                        </div>
                       
                        <div id="delivery">

                            @foreach ($services->deliveries as $item)
                            <div class="mb-1 input-group w-25">
                                <span class="bg-white flex justify-between p-2 w-2/3">
                                 
                                <span>{{ $item->name }}</span>
                                <button onclick="remitem(this)" class="text-red-500  ">حذف</button>
                                <input hidden="" value="{{ $item->id }}" name="dev[]">

                            </span>
                            </div>
                            @endforeach
                            @error('dev')
                            <span class="helper">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-5 gap-3">

                        <label class=""> اضافة وسيلة دفع</label>
                        <br>
                        <div class="flex gap-1   justify-items-center ">

                            <x-admin.select-input id="paymentValue" :options="$pym" />

                   

                            <button class="bg-blue-500 hover:bg-blue-400
                             text-white h-10 font-bold py-2 px-4 border-b-4
                              border-blue-700 my-8   hover:border-blue-500 rounded" onclick="addpyment(event)">
                                اضافة</button>
                        </div>

                        <div id="payment">
                            @foreach ($services->payments as $key => $item)
                            <div class="mb-1 flex ">
                                <span class="bg-white flex justify-between p-2 w-2/3">
                                    <span>{{ $item->name }}</span>
                                    <button onclick="remitem(this)" class="text-red-500  ">حذف</button>
                                    <input hidden="" value="{{$item->id}}" name="pys[]">

                                </span>
                            </div>
                            @endforeach


                            @error('files')
                            <span class="helper">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>


           
                </div>






                <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">
                    <div class="col-xxl-4 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">المرفقات</h5>
                                <!-- Preview -->
                                <div class="dropzone-previews mt-3" id="file-previews"></div>

                            
                    <div class="flex gap-3  ">
                        <div class="mb-5 w-full">
                            <button class="bg-blue-500 hover:bg-blue-400
                             text-white font-bold py-2 px-4 border-b-4
                              border-blue-700 hover:border-blue-500 rounded" onclick="addFile(event)">إضافة
                                ملف</button>
                            <hr class="my-3 ">
                            <div class="w-1/2">
                            <div id="files"></div>
                            @foreach ($filesInput as $key => $item)
                            <div class='flex w-25'>

                                <input class="shadow-sm bg-gray-50  $class border
                                text-gray-900 text-sm rounded-lg focus:ring-blue-500
                               focus:border-blue-500 block w-full p-2.5 " value="{{ $item->name }}" name='files[]'
                                    placeholder='اسم الملف' />
                                <button onclick="remitem(this)" class='text-red-500 py-3 px-2'>حذف</button>
                            </div>
                            @endforeach
                            </div>
                        </div>
                    </div>



                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </form>
    </div>

    <script>
        function addDev(e) {
            e.preventDefault();
            let file = document.getElementById('delivery');
            let div = document.createElement("div")
            let fileV = document.getElementById('devValue');

            div.innerHTML = "<div class='mb-1 input-group w-25'><span class='bg-white flex justify-between p-2 w-2/3'>" + fileV.options[fileV.selectedIndex].text + "<button onclick='remitem(this)' class='text-red-500'>حذف</button></span><input hidden  value='" + fileV.value + "'  name='dev[]' /></div>";
            file.append(div);

        }


        function addpyment(e) {
            e.preventDefault();
            let file = document.getElementById('payment');
            let fileV = document.getElementById('paymentValue');
            let div = document.createElement("div")
            div.innerHTML = "<div class='mb-1 input-group w-25'><span class='bg-white flex justify-between p-2 w-2/3'>" + fileV.options[fileV .selectedIndex].text + "<button onclick='remitem(this)' class='text-red-500'>حذف</button></span><input hidden   value='" + fileV.value +  "'  name='pys[]' /></div>";
            file.append(div);

        }

        function addFile(e) {
            e.preventDefault();
            let file = document.getElementById('files');
            let div = document.createElement("div")
            div.innerHTML =  "<div class='mb-1 flex justify-items-center  w-25'><input class='shadow-sm bg-gray-50  $class border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ' name='files[]' placeholder='اسم الملف' /><button onclick='remitem(this)' class='text-red-500 py-3 px-2'>حذف</button></div>";
            file.append(div);  }

        function remitem(id) {
            id.parentElement.remove();

        }
    </script>

</x-admin.layout>