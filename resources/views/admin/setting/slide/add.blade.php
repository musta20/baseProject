
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>اضافة سيلايد</h3>
</div>
<form method="POST" action="{{url('/admin/Slide')}}">
    @csrf
    <div class="formLaple" >
        <label>عنوان السيلاد </label>
        <input class="form-input" name="title"
        value="{{old('title')}}"
         placeholder="عنوان السيلاد" />

        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="formLaple" >
        <label> الصورة</label>
        <input class="form-input" 
        
        value="{{old('img')}}"

        name="img" placeholder=" الصورة" />
        
        @error('img')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>

    <div class="formLaple" >
        <label> الوصف</label>
        <input class="form-input"
        value="{{old('des')}}"

        name="des" placeholder=" السعر" />
        
        @error('des')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>

    <div class="formLaple" >
        <label> الرابط</label>
        <input class="form-input"
        value="{{old('url')}}"

        name="url" placeholder=" الرابط" />
        
        @error('url')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>




<div>
    <button class="btn btn-Primary" >حفظ</button>

</div>
</form>
</section>
    
@endsection