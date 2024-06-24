<x-admin-layout>
    <h3> اضافة سجل</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <form method="POST" class="w-75" action="{{ route('admin.TasksNotify.index') }}">
            @csrf


            <div class="mb-3">
                <label class="form-label">نوع السجل : </label>
                <select class="form-control" name="type">
                    @foreach ($types as $item)
                        <option value={{ $item->id }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('type')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">الى الموظف : </label>
                <select name="user_id" class="form-control">
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
                <label  class="form-label"> الاسم</label>
                <input class="form-control" name="name" placeholder="عنوان التصنيف" />

                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label"> الرقم</label>
                <input class="form-control" name="number" placeholder=" الرقم" />
                @error('number')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="mb-3">
                <label class="form-label"> تاريخ الاصدار</label>
                <input class="form-control" type="date" name="issueAt" placeholder="  تاريخ الاصدار" />
                @error('issueAt')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            <div class="mb-3">
                <label  class="form-label">بالشهر مدة الصلاحية</label>

                <select class="form-control" name="duration">
                    @for ($i = 1; $i < 25; $i++)
                        <option>{{ $i }}</option>
                    @endfor

                </select>

                @error('duration')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>






            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ route('admin.TasksNotify.index') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>



        </form>


    </x-admin-contaner>
</x-admin-layout>
