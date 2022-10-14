
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>المدن</h3>
</div>
<form method="POST" action="{{url('/admin/JobCity')}}">
    @csrf
    <div class="formLaple" >
        <label>اضافة مدينة </label>
        <input class="form-input" name="name" placeholder="عنوان التصنيف" />

        @error('name')
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