<x-admin-layout>
    <h3> اضافة عنصر</h3>
    <hr>
    <x-admin-contaner>

        <x-card-message></x-card-message>

        <form method="POST" action="{{ url('/admin/SalesType') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label"> الاسم </label>
                <input class="form-control" name="name" placeholder="عنوان التصنيف" />
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            <div class="mb-3">
                <label  class="form-label"> السعر </label>
                <input class="form-control" name="price" placeholder="عنوان التصنيف" />

                @error('price')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ url('admin/SalesType') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>

    </x-admin-contaner>
</x-admin-layout>
