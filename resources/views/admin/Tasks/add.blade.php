<x-admin-layout>
    <h3>اسناد مهمة</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>


        <form method="POST" enctype="multipart/form-data" action="{{ url('/admin/Task') }}">
            @csrf

            <div class="modal-body p-4">
                <div class="mb-3">
                    <label for="projectName" class="form-label">اسم المهمة</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                        placeholder=" اسم المهمة">
                    @error('title')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3" data-select2-id="select2-data-7-k3kd">
                    <label for="formGroupExampleInput" class="form-label">الى الموظف:</label>
                    <select class="form-select select2 select2-hidden-accessible" data-toggle="select2"
                        aria-label="Default select example" data-select2-id="select2-data-1-m3py" tabindex="-1"
                        aria-hidden="true" name="user_id">
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach


                    </select>
                    @error('user_id')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>



                <div class="mb-3">
                    <label for="description" class="form-label">وصف المهمة</label>
                    <textarea class="form-control" id="description" name="des" rows="4">{{ old('des') }}</textarea>
                    @error('des')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="projectName" class="form-label">تاريح بداء المهمة </label>
                    <input class="form-control" type="date" name="start" value="{{ old('start') }}"
                        placeholder=" تاريح بداء المهمة  ">
                    @error('start')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="projectName" class="form-label">تاريح انتهاء المهمة </label>
                    <input class="form-control" type="date" name="end" value="{{ old('end') }}"
                        placeholder=" تاريح بداء المهمة  ">
                    @error('end')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


                <div class="mb-3">

                    <span class="btn btn-light" onclick="addFile()">إضافة ملف</span>

                    <div id="files">

                        @error('files')
                            <span class="helper">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="mb-3">

                    <div class="px-3 pb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-send me-1"></i> حفظ</button>

                        <a type="button" href="{{ url('admin/Task') }}" class="btn btn-light">الغاء</a>
                    </div>
                </div>
            </div>










        </form>


        <script>
            function addFile() {

                let file = document.getElementById('files');
                let div = document.createElement("div")
                div.innerHTML = "<div class='w-50 p-1'> <input class='form-control' name='attachment-" + file.children.length +
                    "' type='file' placeholder='اسم الملف' /></div>";
                file.append(div);

            }
        </script>

    </x-admin-contaner>










</x-admin-layout>
