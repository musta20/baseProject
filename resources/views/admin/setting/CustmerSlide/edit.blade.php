
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>اضافة سيلايد</h3>
</div>
<form method="POST" enctype="multipart/form-data"
action="{{url('/admin/CustmerSlide/'.$slide->id)}}">
    @csrf
    @method('PUT')

    <div class="formLaple" >
        <label> الصورة</label>
        <input class="form-input" 
        

        type="file"

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
        value="{{$slide->url}}"

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