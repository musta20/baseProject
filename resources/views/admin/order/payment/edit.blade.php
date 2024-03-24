<x-admin-layout>

    <h3>اضافة طريقة دفع</h3>
    <hr>

    <x-admin-contaner>

        <x-card-message></x-card-message>



        <form method="POST" class="w-75" action="{{ route('admin.Payment.update' . $payment->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label"> الاسم </label>
                <input class="form-control" value="{{ $payment->name }}" 
                name="name" placeholder="عنوان التصنيف" />

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

                    <a type="button" href="{{ route('admin.Payment.index') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>

    </x-admin-contaner>
</x-admin-layout>
