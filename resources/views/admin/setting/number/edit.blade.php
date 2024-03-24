<x-admin-layout>

    <h3>  تعديل عنصر</h3>
    <hr>

    <x-admin-contaner>
        <x-card-message></x-card-message>


        <form method="POST" class='w-75' action="{{ route('admin.Number.update' , $number->id) }}">
            @csrf
            @method('PUT')




            <div class="mb-3">
                <label class="form-label"> النص</label>
                <input class="form-control" value="{{ $number->title }}" name="title" placeholder=" الصورة" />

                @error('title')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            <div class="mb-3">
                <label class="form-label"> الصورة</label>
                <input class="form-control" value="{{ $number->img }}" name="img" placeholder=" الصورة" />

                @error('img')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="mb-3">
                <label class="form-label"> الرقم</label>
                <input class="form-control" value="{{ $number->number }}" name="number" placeholder=" الرابط" />

                @error('number')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>





            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ url('admin/Number') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>



    </x-admin-contaner>
</x-admin-layout>
