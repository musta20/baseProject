
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>
    <h3>إضافة  وظيفة</h3>
</div>
<form method="POST" action="{{url('/admin/Jobs')}}">
    @csrf
    <div class="formLaple" >
        <label> المسمى الوظيفي</label>
        <input class="form-input" name="title" placeholder="عنوان التصنيف" />
        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="formLaple" >
        <label> مقر الوظيفة </label>

        <select   class="form-input" name="city_id" >
            @foreach ($jobCity as $item)
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
        <label> الوصف</label>
        <textarea class="form-input" name="des" placeholder=" الوصف" cols="30" rows="10"></textarea>

        @error('des')
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