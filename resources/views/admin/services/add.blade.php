<x-admin-layout>

    <h3>الخدمات</h3>

    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <form method="POST" action="{{ url('/admin/Services') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">عنوان الخدمة</label>
                <input class="form-control" name="name" value="{{ old('name') }}" placeholder="عنوان الخدمة" />
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>
            <div class="mb-3">
                <label  class="form-label"> الايقونة</label>
                <input  class="form-control" value="{{ old('icon') }}" name="icon" placeholder=" الايقونة" />

                @error('icon')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            <div class="mb-3">
                <label class="form-label"> التصنيف</label>
                <select class="form-select select2 select2-hidden-accessible" name="cat_id">
                    @foreach ($cat as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
                @error('cat_id')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <span class="btn btn-success p-1" onclick="addFile()">إضافة ملف</span>

            <div class="p-1" id="files">

                @error('files')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>








            <div class="mb-3">

                <label class="form-lable"> السعر</label>

                <input class="form-control" value="{{ old('price') }}" name="price" placeholder=" السعر" />

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

                    <a type="button" href="{{ url('admin/Services') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>


        </form>


        <script>
            function addFile() {
                let file = document.getElementById('files');
                let div = document.createElement("div")
                div.innerHTML = "<div class='mb-1'><input class='form-control' name='files-" + file.children.length +
                    "' placeholder='اسم الملف' /></div>";
                file.append(div);

            }
        </script>


    </x-admin-contaner>
</x-admin-layout>
