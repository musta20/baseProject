<x-admin-layout>

    <h3>اضافة رابط</h3>

    <x-admin-contaner>

        <x-card-message></x-card-message>

        <form method="POST" class="w-75" action="{{ url('/admin/Social/' . $social->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label"> الصورة</label>
                <input class="form-control" value="{{ $social->img }}" name="img" placeholder=" الصورة" />

                @error('img')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="mb-3">
                <label class="form-label"> الرابط</label>
                <input class="form-control" value="{{ $social->url }}" name="url" placeholder=" الرابط" />

                @error('url')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>





            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ url('admin/Social') }}" class="btn btn-light">الغاء</a>
                </div>

            </div>
        </form>

    </x-admin-contaner>
</x-admin-layout>
