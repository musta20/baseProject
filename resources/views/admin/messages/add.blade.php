
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>
    <h3>إرسال رسالة</h3>
</div>
<form method="POST" action="{{url('/admin/Messages')}}">
    @csrf

    <div class="formLaple" >
        <label> : إلى</label>
        <select class="form-input" name="to" placeholder=" الى" >
            @foreach ($Users as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        
        @error('to')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>


    <div class="formLaple" >
        <label> عنوان الرسالة</label>
        <input class="form-input" name="title" placeholder="عنوان الرسالة" />

        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>

    <div class="formLaple" >
        <label> نص الرسالة</label>
        <textarea class="form-input" name="message" placeholder=" نص الرسالة" cols="30" rows="10"></textarea>

        @error('message')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>


<div>
    <button class="btn btn-Primary" >إرسال</button>

</div>
</form>
</section>
    
@endsection