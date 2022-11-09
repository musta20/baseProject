<x-admin-layout>



    <x-admin-contaner>






        <div class="row">
            <x-card-message></x-card-message>

            <div class="col-xxl-8 col-xl-7">
                <!-- project card -->
                <form method="POST" action="{{ url('/admin/EditTask/' . $task->id) }}">
                    @csrf
                <div class="card d-block">
                    <div class="card-body">
                        <div class="dropdown card-widgets">
                            <button  type="submit" class="btn btn-primary">
                                <i class="mdi mdi-send me-1"></i> حفظ</button>
                            
                        </div> <!-- end dropdown-->
                        
                        <div class="form-check float-start">
                                <label> تعديل حالة المهمة </label>
                                <select name="status" class="form-input">
                                    @switch($task->isdone)
                                        @case(0)
                                            <option value="0">لم يستلم المعهمة بعد</option>
                                            <option value="1">بداء العمل عليها</option>
                                            <option value="2"> انجز جزئي للمهمة</option>
                                        @break
                
                                        @case(1)
                                            <option value="1">بداء العمل عليها</option>
                                            <option value="0">لم يستلم المعهمة بعد</option>
                                            <option value="2"> انجز جزئي للمهمة</option>
                                            <option value="3"> تم الانجاز</option>
                                        @break
                
                                        @case(2)
                                            <option value="2"> انجز جزئي للمهمة</option>
                                            <option value="1">بداء العمل عليها</option>
                                            <option value="0">لم يستلم المعهمة بعد</option>
                                            <option value="3"> تم الانجاز</option>
                                        @break
                
                                        @case(3)
                                            <option value="3"> تم الانجاز</option>
                                            <option value="2"> انجز جزئي للمهمة</option>
                                            <option value="1">بداء العمل عليها</option>
                                            <option value="0">لم يستلم المعهمة بعد</option>
                                        @break
                
                                        @default
                                    @endswitch
                
                
                                </select>
                
                                @error('user_id')
                                    <span class="helper">
                                        {{ $message }}
                                    </span>
                                @enderror
                
                        </div> <!-- end form-check-->
                        
                        <div class="clearfix"></div>

                        <h3 class="mt-3">{{ $task->title }}</h3>

                        <div class="row">
                            <div class="col-6">
                                <!-- assignee -->
                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">مسندة الى</p>
                                <div class="d-flex">
                                    {{-- <img src="assets/images/users/avatar-9.jpg" 
                                    alt="Arya S" class="rounded-circle me-2" height="24"> --}}
                                    <div>
                                        <h5 class="mt-1 font-14">
                                            {{ $task->user->name }}
                                        </h5>
                                    </div>
                                </div>
                                <!-- end assignee -->
                            </div> <!-- end col -->

                            <div class="col-6">
                                <!-- start due date -->
                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">تاريخ الانشاء</p>
                                <div class="d-flex">
                                    <i class="uil uil-schedule font-18 text-success me-1"></i>
                                    <div>
                                        <h5 class="mt-1 font-14">
                                            {{ $task->created_at->isoFormat('dddd D') }}
                                        </h5>
                                    </div>
                                </div>
                                <!-- end due date -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-6">
                                <!-- assignee -->
                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">
                                   حالة المهمة </p>
                                <div class="d-flex">
                                    {{-- <img src="assets/images/users/avatar-9.jpg" 
                                    alt="Arya S" class="rounded-circle me-2" height="24"> --}}
                                    <div>
                                        <h5 class="mt-1 font-14">
                                            <td>
                                                @switch($task->isdone)
                                                    @case(0)
                                                        لم يستلم المعهمة بعد
                                                    @break
                        
                                                    @case(1)
                                                        بداء العمل عليها
                                                    @break
                        
                                                    @case(2)
                                                        انجز جزئي للمهمة
                                                    @break
                        
                                                    @case(3)
                                                        تم الانجاز
                                                    @break
                        
                                                    @case(5)
                                                        ملغية
                                                    @break
                        
                                                    @default
                                                @endswitch
                                                </select>
                                            </td>
                                        </h5>
                                    </div>
                                </div>
                                <!-- end assignee -->
                            </div> <!-- end col -->

             
                        </div> <!-- end row -->


                        <h5 class="mt-3">التفاصيل:</h5>

                        <p class="text-muted mb-4">
                            {{ $task->des }}

                        </p>

    

                    </div> <!-- end card-body-->
                    
                </div> <!-- end card-->
                </form>
                  <!-- end card-->
            </div> <!-- end col -->

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
                                        <a  target="_blank" href="{{ url('/storage/' . $item->name) }}"
                                         class="text-muted fw-bold">
                                        رقم  ملف {{ $key }}
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










    </x-admin-contaner>
</x-admin-layout>
