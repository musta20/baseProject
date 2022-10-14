
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>الخدمة</h3>
</div>
<form method="POST" action="{{url('/admin/Services/'.$services->id)}}">
    @csrf
    @method('PUT')
    <div class="formLaple" >
        <label>عنوان الخدمة</label>
        <input class="form-input"
        value="{{$services->name}}"
        name="name" placeholder="عنوان التصنيف" />

        @error('name')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="formLaple" >
        <label> الايقونة</label>
        <input class="form-input"
        value="{{$services->icon}}"

        name="icon" placeholder=" الايقونة" />
        @error('icon')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="formLaple" >
        <label> السعر</label>
        <input class="form-input"
        name="price" placeholder=" السعر" cols="30" rows="10"
        value="{{$services->price}}"
        />
       

        @error('price')
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