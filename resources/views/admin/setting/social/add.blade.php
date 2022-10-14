
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>اضافة رابط</h3>
</div>
<form method="POST" action="{{url('/admin/Social')}}">
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