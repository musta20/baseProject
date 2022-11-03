
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>إضافة طريقة دقع</h3>
</div>
<form method="POST" action="{{url('/admin/Payment/'.$payment->id)}}">
    @csrf
    @method('PUT')
    <div class="formLaple" >
        <label> الاسم </label>
        <input class="form-input"
        value="{{$payment->name}}"
        name="name" placeholder="عنوان التصنيف" />

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