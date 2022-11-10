<x-admin-layout>

    <h3> تعدل التصنيف </h3>

    <hr>
    <x-admin-contaner>
    <x-card-message></x-card-message>


    <form method="POST" class="w-75" action="{{url('/admin/Category/'.$category->id)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">عنوان التصنيف</label>
        <input class="form-control"
        value="{{$category->title}}"
        name="title" placeholder="عنوان التصنيف" />

        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="mb-3">
        <label class="form-label"> الايقونة</label>
        <input class="form-control"
        value="{{$category->icon}}"

        name="icon" placeholder=" الايقونة" />
        @error('icon')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="mb-3">
        <label class="form-label"> الوصف</label>
        <textarea  class="form-control"
        name="des" placeholder=" الوصف" cols="30" rows="10">
        {{$category->des}}
    </textarea>

        @error('des')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>


    <div class="mb-3">

        <div class="px-3 pb-3">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-send me-1"></i> حفظ</button>

            <a type="button" href="{{ url('admin/Category') }}" class="btn btn-light">الغاء</a>
        </div>
    </div>
</form>



    </x-admin-contaner>
</x-admin-layout>