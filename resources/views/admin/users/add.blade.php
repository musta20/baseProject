<x-admin.layout>
    <div class="px-5  pt-5">
        <div method="POST" >
            @csrf
            <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600"> 
                    إنشاء مستخدم 
                </span>

                <a href="{{ route('admin.UsersList') }}"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                 جميع المستخدميين   
                </a>
                
            </div>
            <div class=" p-3 bg-slate-100 rounded-md border border-gray-300 ">
                <form class="mx-auto w-1/2 "  method="POST" 
                action="{{ route('admin.Users.store') }}"
                >
                    @csrf

                    {{-- <x-admin.input-card name="email" label="البريد الالكتروني" /> --}}


                    <div class=" p-3 text-slate-800 ">
                        <x-admin.input-card label="الاسم" placeholder="الاسم" name="name"  />
                    </div>

                    <div class=" p-3 text-slate-800 ">
                        <x-admin.select-input label="الصلاحية" :options="$role" name="role"  />
                    </div> 
                    
                    <span>
                        <x-admin.input-card label="البريد الالكتروني" placeholder="البريد الالكتروني" name="email"  />

                    </span>


                    <span>
                        <x-admin.input-card label="كلمة المرور" placeholder="كلمة المرور" type="password" name="password"  />

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



{{-- <x-admin-layout>
    <h3>انشاء مستخدم</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <form method="POST" class="w-75" enctype="multipart/form-data"
         action="{{ route('admin.UsersList') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label"> الاسم </label>
                <input class="form-control" name="name" placeholder="الاسم" />
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label"> الصلاحية</label>
                <select class="form-select select2 select2-hidden-accessible" name="role">
                    @foreach ($role as $item)
                        <option value="{{ $item->id }}">{{ __($item->name) }}</option>
                    @endforeach
                </select>
                @error('job_cities_id')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label"> البريد الالكتروني </label>
                <input class="form-control" type="email" name="email" placeholder="البريد الالكتروني " />
                @error('email')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label"> كلمة المرور </label>
                <input class="form-control" type="password" name="password" placeholder="كلمة المرور " />
                @error('password')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>


            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ route('admin.UsersList') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>

    </x-admin-contaner>
</x-admin-layout> --}}
