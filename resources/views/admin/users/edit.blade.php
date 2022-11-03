
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>
    <h3>تعديل مستخدم</h3>
</div>
<form method="POST" action="{{url('/admin/Users/'.$user->id)}}">
    @csrf
    @method('PUT')
    <div class="formLaple" >
        <label> الاسم </label>
        <input class="form-input"
        value="{{$user->name}}"
        name="name" placeholder="الاسم" />
        @error('name')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="formLaple" >
        <label> الصلاحية</label>

@if ($user->hasAnyRole($role))

<select   class="form-input" name="role" >
    <option value="{{$user->roles->pluck('id')[0]}}">{{$user->roles->pluck('name')[0]}}</option>
    @foreach ($role as $item)
    @if ($user->roles->pluck('name')[0] !=$item->name )
    <option value="{{$item->id}}">{{$item->name}}</option>
    @endif   
    @endforeach

</select>
    
@else

<select class="form-input" name="role" >
    @foreach ($role as $item)
    <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
</select>


    
@endif




        @error('role')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>

    <div class="formLaple" >
        <label> البريد الالكتروني </label>
        <input class="form-input" type="email"
        value="{{$user->email}}"

        name="email" placeholder="البريد الالكتروني " />
        @error('email')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>

    <div class="formLaple" >
        <label>   إنشاء كلمة مرور جديدة </label>
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