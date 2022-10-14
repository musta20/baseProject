
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>اضافة سيلايد</h3>
</div>
<form method="POST" action="{{url('/admin/Social/'.$social->id)}}">
    @csrf
    @method('PUT')

    <div class="formLaple" >
        <label> الصورة</label>
        <input class="form-input" 
        
        value="{{$social->img}}"

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
        value="{{$social->url}}"

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