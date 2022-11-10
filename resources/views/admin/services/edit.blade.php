<x-admin-layout>

    <h3>تعديل الخدمة</h3>

    <hr>
    <x-admin-contaner>

        <x-card-message></x-card-message>


        <form method="POST" class="w-75" action="{{ url('/admin/Services/' . $services->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">عنوان الخدمة</label>
                <input class="form-control" value="{{ $services->name }}" name="name" placeholder="عنوان التصنيف" />

                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label"> التصنيف</label>
                <select class="form-select select2 select2-hidden-accessible" name="cat_id">
                    <option value="{{ $catmy->id }}">{{ $catmy->title }}</option>

                    @foreach ($cat as $item)
                        @if ($item->id != $services->cat_id)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endif
                    @endforeach
                </select>
                @error('cat_id')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>


            <div class="mb-3">
                <label  class="form-label"> الايقونة</label>
                <input class="form-control" value="{{ $services->icon }}" name="icon" placeholder=" الايقونة" />
                @error('icon')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            <span class="btn btn-success p-1" onclick="addFile()">إضافة ملف</span>
            <div id="files">

                @foreach ($filesInput as $key => $item)
                    <div class='mb-1'>

                        <input class='form-control' value="{{ $item->name }}" name='files-{{ $key }}'
                            placeholder='اسم الملف' />

                    </div>
                @endforeach


                @error('files')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>





            <div class="mb-3">
                <label class="form-label"> السعر</label>
                <input class="form-control" name="price" placeholder=" السعر" cols="30" rows="10"
                    value="{{ $services->price }}" />


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
                //   file.preventDefault();
                let file = document.getElementById('files');
                let div = document.createElement("div")
                div.innerHTML = "<div class='formLaple'><input class='form-input' name='files-" + file.children.length +
                    "' placeholder='اسم الملف' /></div>";
                file.append(div);

            }
        </script>


    </x-admin-contaner>
</x-admin-layout>
