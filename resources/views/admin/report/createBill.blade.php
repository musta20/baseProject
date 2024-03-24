<x-admin-layout>
    <h3>إضافة وظيفة</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <form method="POST" class="w-75" action="{{ route('admin.postCreateBill') }}">
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
</x-admin-layout>
