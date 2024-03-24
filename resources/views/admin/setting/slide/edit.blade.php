
<x-admin-layout>
    <h3>اضافة سيلايد</h3>
    <hr>
    <x-admin-contaner>
    <x-card-message></x-card-message>

<form method="POST" class="w-75" enctype="multipart/form-data"
action="{{route('admin.Slide.update',$slide->id)}}">
    @csrf
    @method('PUT')
    <div class="mb-3" >
        <label class="form-label">عنوان السيلاد </label>
        <input class="form-control" name="title"
        value="{{$slide->title}}"
         placeholder="عنوان السيلاد" />

        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="mb-3" >
        <label class="form-label"> الصورة</label>
        <input class="form-control" 
        
        value="{{$slide->img}}"

        name="img" placeholder=" الصورة" />
        
        @error('img')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>

    <div class="mb-3" >
        <label class="form-label"> الوصف</label>
        <input class="form-control"
        value="{{$slide->des}}"

        name="des" placeholder=" السعر" />
        
        @error('des')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>

    <div class="mb-3" >
        <label class="form-label"> الرابط</label>
        <input class="form-control"
        value="{{$slide->url}}"

        name="url" placeholder=" الرابط" />
        
        @error('url')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>




    <div class="mb-3">

        <div class="px-3 pb-3">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-send me-1"></i> حفظ</button>

            <a type="button" href="{{ url('admin/Slide') }}" class="btn btn-light">الغاء</a>
        </div>
    </div>


</form>

    </x-admin-contaner>

</x-admin-layout>

