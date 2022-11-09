<x-admin-layout>

    <h3>طرق التوصيل</h3>

    <x-admin-contaner>
        <x-card-message></x-card-message>


        <form method="POST" action="{{ url('/admin/Delivery/' . $delivery->id) }}">
            @csrf
            @method('PUT')
            <div class="formLaple">
                <label> الاسم </label>
                <input class="form-input" value="{{ $delivery->name }}" name="name" placeholder="عنوان التصنيف" />

                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div>
                <button class="btn btn-Primary">حفظ</button>

            </div>
        </form>

    </x-admin-contaner>
</x-admin-layout>
