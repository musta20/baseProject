
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>التصنيفات</h3>
</div>
<form method="POST" action="{{url('/admin/Category/'.$category->id)}}">
    @csrf
    @method('PUT')
    <div class="formLaple" >
        <label>عنوان التصنيف</label>
        <input class="form-input"
        value="{{$category->title}}"
        name="title" placeholder="عنوان التصنيف" />

        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="formLaple" >
        <label> الايقونة</label>
        <input class="form-input"
        value="{{$category->icon}}"

        name="icon" placeholder=" الايقونة" />
        @error('icon')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="formLaple" >
        <label> الوصف</label>
        <textarea class="form-input"
        name="des" placeholder=" الوصف" cols="30" rows="10">
        {{$category->des}}
    </textarea>

        @error('des')
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