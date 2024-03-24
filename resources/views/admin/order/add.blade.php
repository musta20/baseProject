<x-admin-layout>

    <h3>التصنيفات</h3>

    <x-admin-contaner>

        <x-card-message></x-card-message>


        <form method="POST" action="{{ route('admin.Category.store') }}">
            @csrf
            <div class="formLaple">
                <label>عنوان التصنيف</label>
                <input class="form-input" name="title" placeholder="عنوان التصنيف" />

                @error('title')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>
            <div class="formLaple">
                <label> الايقونة</label>
                <input class="form-input" name="icon" placeholder=" الايقونة" />

                @error('icon')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>
            <div class="formLaple">
                <label> الوصف</label>
                <textarea class="form-input" name="des" placeholder=" الوصف" cols="30" rows="10"></textarea>

                @error('des')
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
