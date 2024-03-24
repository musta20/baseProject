<x-admin-layout>
    <h3>تعديل وظيفة</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <form method="POST" class="w-75" action="{{ route('admin.Jobs.update' , $jobs->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label"> المسمى الوظيفي</label>
                <input class="form-control" value="{{ $jobs->title }}" name="title" placeholder=" المسمى الوظيفي " />

                @error('title')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label"> مقر الوظيفة</label>

                <select class="form-select select2 select2-hidden-accessible" name="job_cities_id">
                    <option value="{{ $currentcity->id }}">{{ $currentcity->name }}</option>

                    @foreach ($jobCity as $item)
                        @if ($jobs->job_cities_id != $item->id)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
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
                <textarea class="form-control" name="des" placeholder=" الوصف" cols="30" rows="10">
        {{ $jobs->des }}
    </textarea>

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

                    <a type="button" href="{{ route('admin.Jobs.index') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>



    </x-admin-contaner>
</x-admin-layout>
