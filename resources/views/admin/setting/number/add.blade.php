
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>اضافة رابط</h3>
</div>
<form method="POST" action="{{url('/admin/Number')}}">
    @csrf

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
        <label> النص</label>
        <input class="form-input"
        value="{{old('title')}}"

        name="title" placeholder=" النص" />
        
        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>

    <div class="formLaple" >
        <label> الرقم</label>
        <input class="form-input"
        value="{{old('number')}}"

        name="number" placeholder=" الرقم" />
        
        @error('number')
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