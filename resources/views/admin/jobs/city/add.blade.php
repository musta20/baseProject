<x-admin-layout>
    <h3> اضافة مدينة</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <form method="POST" class="w-75" action="{{ url('/admin/JobCity') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">اسم مدينة </label>
                <input class="form-control" name="name" placeholder="اسم المدينة " />

                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ url('admin/JobCity') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>



    </x-admin-contaner>
</x-admin-layout>
