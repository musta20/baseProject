<x-admin-layout>
    <h3>إضافة وظيفة</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <form method="POST" class="w-75" action="{{ url('/admin/Jobs') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label"> المسمى الوظيفي</label>
                <input class="form-control" value="{{ old('title') }}" name="title" placeholder="عنوان التصنيف" />
                @error('title')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label"> مقر الوظيفة </label>
                <select class="form-select select2 select2-hidden-accessible" name="job_cities_id">
                    @foreach ($jobCity as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('job_cities_id')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label"> الوصف</label>
                <textarea class="form-control" name="des" placeholder=" الوصف" cols="30" rows="10">{{ old('des') }}</textarea>

                @error('des')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ url('admin/Jobs') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>


    </x-admin-contaner>
</x-admin-layout>
