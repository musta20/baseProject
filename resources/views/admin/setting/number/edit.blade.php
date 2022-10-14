
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>اضافة سيلايد</h3>
</div>
<form method="POST" action="{{url('/admin/Number/'.$number->id)}}">
    @csrf
    @method('PUT')




    <div class="formLaple" >
        <label> النص</label>
        <input class="form-input" 
        
        value="{{$number->title}}"

        name="title" placeholder=" الصورة" />
        
        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>


    <div class="formLaple" >
        <label> الصورة</label>
        <input class="form-input" 
        
        value="{{$number->img}}"

        name="img" placeholder=" الصورة" />
        
        @error('img')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>



    <div class="formLaple" >
        <label> الرقم</label>
        <input class="form-input"
        value="{{$number->number}}"

        name="number" placeholder=" الرابط" />
        
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