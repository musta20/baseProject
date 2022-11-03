
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>
    <h3>انشاء مستخدم</h3>
</div>
<form method="POST" action="{{url('/admin/Users')}}">
    @csrf
    <div class="formLaple" >
        <label> الاسم </label>
        <input class="form-input" name="name" placeholder="الاسم" />
        @error('name')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="formLaple" >
        <label> الصلاحية</label>
        <select   class="form-input" name="role" >
            @foreach ($role as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
                
            @endforeach


        </select>


        @error('city_id')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>

    <div class="formLaple" >
        <label> البريد الالكتروني </label>
        <input class="form-input" type="email" name="email" placeholder="البريد الالكتروني " />
        @error('email')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>

    <div class="formLaple" >
        <label> كلمة المرور  </label>
        <input class="form-input" type="password" name="password" placeholder="كلمة المرور " />
        @error('password')
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