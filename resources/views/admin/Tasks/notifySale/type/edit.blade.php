
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>اضافة</h3>
</div>
<form method="POST" action="{{url('/admin/SalesType/'.$NotifyType->id)}}">
    @csrf
    @method('PUT')
    <div class="formLaple" >
        <label> الاسم </label>
        <input class="form-input"
        value="{{$NotifyType->name}}"
        name="name" placeholder="عنوان التصنيف" />

        @error('name')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
  

    <div class="formLaple" >
        <label> السعر </label>
        <input class="form-input"
        value="{{$NotifyType->price}}"
        name="price" placeholder="عنوان التصنيف" />

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