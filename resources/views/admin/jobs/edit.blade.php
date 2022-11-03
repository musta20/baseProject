
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>التصنيفات</h3>
</div>
<form method="POST" action="{{url('/admin/Jobs/'.$jobs->id)}}">
    @csrf
    @method('PUT')
    <div class="formLaple" >
        <label>عنوان التصنيف</label>
        <input class="form-input"
        value="{{$jobs->title}}"
        name="title" placeholder="عنوان التصنيف" />

        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="formLaple" >
        <label> مقر الوظيفة</label>

        <select class="form-input" name="city_id">
            <option value="{{ $currentcity->id }}">{{ $currentcity->name }}</option>

            @foreach ($jobCity as $item)
            @if ($jobs->city_id != $item->id)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
                
            @endif
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
        <textarea class="form-input"
        name="des" placeholder=" الوصف" cols="30" rows="10">
        {{$jobs->des}}
    </textarea>

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