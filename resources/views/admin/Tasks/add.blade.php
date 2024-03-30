<x-admin.layout>
    <div class="px-5  pt-5">
        <form method="POST"  enctype="multipart/form-data" action="{{ route('admin.Task.index') }}">
            @csrf
           
            <div
                class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600"> تعديل المهمة</span>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    حفظ التغييرات</button>
            </div>
            <div class="flex gap-2">
                <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">

                    <div class="flex gap-3 w-full">

                           

                                <x-admin.input-card for="title"  name="title" label="عنوان المهمة" />


                        </div>

                    

                        <div class="flex gap-3   ">
                       

                                    <x-admin.input-card name="start" type="date" label="تاريخ بداية المهمة" />
                                <x-admin.input-card name="end" type="date"   label="تاريخ إنهاء المهمة" />

                        </div>
                        <div class="flex gap-3 w-full" >
                            
                            <x-admin.select-input  :options="$users" name="user_id"
                                label="الى الموظف " />
                        </div>

                        <div class="flex gap-5 p-3 text-slate-800 ">
                        
                                <x-admin.textarea-card  name="des"   rows="4"
                                 label="تفاصيل المهمة" />
                        </div>

                    </div>
                <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">
                    <div class="col-xxl-4 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">المرفقات</h5>
                         
                <div class="mb-3">

                    <button
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"

                    onclick="addFile(event)">إضافة ملف</button>

                    <div id="files">

                        @error('files')
                            <span class="helper">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </form>
    </div>
    </x-admin.layout>



    <script>
        function addFile(e) {
           e.preventDefault()
            let file = document.getElementById('files');
            let div = document.createElement("div")
            div.innerHTML = "<div class='w-50 p-1'> <input class='shadow-sm bg-gray-50   border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ' name='attachment-" + file.children.length +
                "' type='file' placeholder='اسم الملف' /></div>";
            file.append(div);

        }
    </script>









{{-- 
<x-admin-layout>
    <h3>اسناد مهمة</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>


        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.Task.index') }}">
            @csrf

            <div class="modal-body p-4">
                <div class="mb-3">
                    <label for="projectName" class="form-label">اسم المهمة</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                        placeholder=" اسم المهمة">
                    @error('title')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3" data-select2-id="select2-data-7-k3kd">
                    <label for="formGroupExampleInput" class="form-label">الى الموظف:</label>
                    <select class="form-select select2 select2-hidden-accessible" data-toggle="select2"
                        aria-label="Default select example" data-select2-id="select2-data-1-m3py" tabindex="-1"
                        aria-hidden="true" name="user_id">
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach


                    </select>
                    @error('user_id')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>



                <div class="mb-3">
                    <label for="description" class="form-label">وصف المهمة</label>
                    <textarea class="form-control" id="description" name="des" rows="4">{{ old('des') }}</textarea>
                    @error('des')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="projectName" class="form-label">تاريح بداء المهمة </label>
                    <input class="form-control" type="date" name="start" value="{{ old('start') }}"
                        placeholder=" تاريح بداء المهمة  ">
                    @error('start')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="projectName" class="form-label">تاريح انتهاء المهمة </label>
                    <input class="form-control" type="date" name="end" value="{{ old('end') }}"
                        placeholder=" تاريح بداء المهمة  ">
                    @error('end')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


                <div class="mb-3">

                    <span class="btn btn-light" onclick="addFile()">إضافة ملف</span>

                    <div id="files">

                        @error('files')
                            <span class="helper">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="mb-3">

                    <div class="px-3 pb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-send me-1"></i> حفظ</button>

                        <a type="button" href="{{ route('admin.Task.index') }}" class="btn btn-light">الغاء</a>
                    </div>
                </div>
            </div>










        </form>


        <script>
            function addFile() {

                let file = document.getElementById('files');
                let div = document.createElement("div")
                div.innerHTML = "<div class='w-50 p-1'> <input class='form-control' name='attachment-" + file.children.length +
                    "' type='file' placeholder='اسم الملف' /></div>";
                file.append(div);

            }
        </script>

    </x-admin-contaner>










</x-admin-layout> --}}
