<x-admin.layout>
    <div class="px-5  pt-5">
        <form method="POST" action="{{route('admin.Task.update',$task->id)}}">
            @csrf
            @method('PUT') <div
                class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600"> تعديل المهمة</span>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    حفظ التغييرات</button>
            </div>
            <div class="flex gap-2">
                <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">

                    <div class="flex gap-3 w-full">

                            <x-admin.select-input :selected="$task->isdone" :options="$option" name="status"
                                label="تعديل حالة المهمة" />


                                <x-admin.input-card for="title" value="{{$task->title}}" label="عنوان المهمة" />


                        </div>

                    

                        <div class="flex gap-3   ">
                       

                                    <x-admin.input-card for="title" type="date" value="{{$task->start}}" label="تاريخ بداية المهمة" />
                                <x-admin.input-card for="title" type="date" value="{{$task->end}}"  label="تاريخ إنهاء المهمة" />

                        </div>
                        <div class="flex gap-3 w-full" >
                            
                            <x-admin.select-input :selected="$task->user->id" :options="$users" name="user_id"
                                label="الى الموظف " />
                        </div>

                        <div class="flex gap-5 p-3 text-slate-800 ">
                        
                                <x-admin.textarea-card     rows="4"
                                value="{{$task->des}}" label="تفاصيل المهمة" />
                        </div>

                    </div>
                <div class=" p-3 bg-slate-100 w-1/2 rounded-md border border-gray-300 ">
                    <div class="col-xxl-4 col-xl-5">
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











    </x-admin.layout>
    {{-- <x-admin-layout>

        <h3>تعديل مهمة</h3>
        <hr>
        <x-admin-contaner>
            <x-card-message></x-card-message>

            <form method="POST" class="w-75" action="{{route('admin.Task.update',$task->id)}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label"> اسم المهمة </label>
                    <input class="form-control" name="title" value="{{$task->title}}" placeholder=" اسم المهمة" />
                    @error('title')
                    <span class="helper">
                        {{$message}}
                    </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label class="form-label"> حالة المهمة : </label>
                    <x-admin.select-input :selected="$task->isdone" :options="$option" name="isdone"
                        label="تعديل حالة المهمة" />
                </div>

                <div class="mb-3">
                    <label class="form-label">الى الموظف : </label>
                    <select name="user_id" class="form-select select2 select2-hidden-accessible">

                        <option value="{{$task->id}}">{{$task->user->name}}</option>
                        @foreach ($users as $item)

                        @if ($item->id != $task->id)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif

                        @endforeach
                    </select>

                    @error('user_id')
                    <span class="helper">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"> وصف المهمة </label>
                    <textarea class="form-control" name="des" rows="12"
                        placeholder=" وصف المهمة ">{{$task->des}}</textarea>
                    @error('des')
                    <span class="helper">
                        {{$message}}
                    </span>
                    @enderror
                </div>



                <div class="mb-3">
                    <label class="form-label"> تاريخ بداء المهمة </label>
                    <input type="date" class="form-control" name="start" value="{{$task->start}}"
                        placeholder=" اسم المهمة" />
                    @error('start')
                    <span class="helper">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">تاريخ إنهاء المهمة </label>
                    <input type="date" class="form-control" name="end" value="{{$task->end}}"
                        placeholder=" اسم المهمة" />
                    @error('end')
                    <span class="helper">
                        {{$message}}
                    </span>
                    @enderror
                </div>




                <div class="mb-3">

                    <div class="px-3 pb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-send me-1"></i> حفظ</button>

                        <a type="button" href="{{ route('admin.Task.index') }}" class="btn btn-light">الغاء</a>
                    </div>
                </div>

            </form>

        </x-admin-contaner>
    </x-admin-layout> --}}