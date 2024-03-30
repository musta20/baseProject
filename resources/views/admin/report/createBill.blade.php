
<x-admin.layout>
    <div class="px-5  pt-5">
        <div method="POST" >
            @csrf
            <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600"> إنشاء فاتورة</span>
              
            </div>
            <div class=" p-3 bg-slate-100 rounded-md border border-gray-300 ">
                <form class="mx-auto w-1/2  " method="POST" action="{{ route('admin.Report.postCreateBill') }}">
                    @csrf



                    <div class=" p-3 text-slate-800 ">
                        <x-admin.input-card  label=" اسم العميل " name="name" placeholder="اسم العميل"  />
                    </div>

                    <div class=" p-3 text-slate-800 ">
                        <x-admin.input-card name="email" placeholder="عنوان البريد الالكتروني" label="البريد الالكتروني" />

                    </div>


                    <div class=" p-3 text-slate-800 ">
                        <x-admin.input-card name="phone" placeholder="رقم الهاتف" label=" هاتف العميل " />

                       
                    </div>

                    <span class="flex gap-5" >

                        <x-admin.input-card name="code" placeholder=" كود المنتج" label=" كود المنتج " />
                        <x-admin.input-card name="des" placeholder=" الوصف" label=" الوصف  " />
                        <x-admin.input-card name="price" placeholder=" السعر" label=" السعر   " />
                        <x-admin.input-card name="count"  placeholder=" العدد" label=" الكمية  " />
                       

                    </span>
                    <x-admin.input-card name="price" placeholder=" المبلغ" label=" المبلغ  " />

                    <hr>
                    <button type="submit" 
                        class="bg-blue-500 my-4 flex gap-2 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                
                          
                        أنشاء</button>
                </form>


            </div>


        </div>
    </div>


</x-admin.layout>
{{-- 
<x-admin-layout>
    <h3>إضافة وظيفة</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <form method="POST" class="w-75" action="{{ route('admin.Report.postCreateBill') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label"> اسم العميل </label>
                <input class="form-control" value="{{ old('name') }}"
                 name="name" placeholder="عنوان التصنيف" />
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label"> البريد الالكتروني  </label>
                <input class="form-control" value="{{ old('email') }}"
                 name="email" placeholder="عنوان التصنيف" />
                @error('email')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>


            <div class="mb-3">
                <label class="form-label"> هاتف العميل </label>
                <input class="form-control" value="{{ old('phone') }}"
                 name="phone" placeholder="عنوان التصنيف" />
                @error('phone')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>
            <div class="row">
                <div class="col">كود المنتج</div>
                <div class="col">الوصف</div>
                <div class="col">السعر</div>
                <div class="col">الكمية</div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <input class="form-control" value="{{ old('id') }}" name="id"
                        placeholder="  كود المنتج" />
                    @error('id')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                <div class="mb-3 col">
                    <input class="form-control" value="{{ old('des') }}" name="وصف المنتج"
                        placeholder="وصف المنتج" />
                    @error('des')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>
                <div class="mb-3 col">
                    <input class="form-control" value="{{ old('price') }}" name="price"
                        placeholder="السعر " />
                    @error('price')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                <div class="mb-3 col">
                    <input class="form-control" value="{{ old('count') }}" name="count"
                        placeholder=" العدد" />
                    @error('count')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>
     
            </div>

            <div class="mb-3">
                <label class="form-label">  المبلغ المدفوع </label>
                <input class="form-control" value="{{ old('payed') }}" 
                name="payed" placeholder="المبلغ المدفوع " />
                @error('payed')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="px-3 pb-3">
                <button type="submit" class="btn btn-primary">
                    <i class="mdi mdi-send me-1"></i> طباعة</button>

                <a type="button" href="{{ route('admin.Services.index') }}" class="btn btn-light">الغاء</a>
            </div>
        </form>


    </x-admin-contaner>
</x-admin-layout> --}}
