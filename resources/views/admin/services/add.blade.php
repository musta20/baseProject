
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>الخدمات</h3>
</div>
<form method="POST" action="{{url('/admin/Services')}}">
    @csrf
    <div class="formLaple" >
        <label>عنوان الخدمة</label>
        <input class="form-input" name="name"
        value="{{old('name')}}"
        placeholder="عنوان الخدمة" />
        @error('name')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="formLaple" >
        <label> الايقونة</label>
        <input class="form-input" 
        
        value="{{old('icon')}}"

        name="icon" placeholder=" الايقونة" />
        
        @error('icon')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>


    <div class="formLaple" >
        <label> التصنيف</label>
        <select name="cat_id" >

                @foreach($cat as $item)
                
                <option value="{{$item->id}}" >{{$item->title}}</option>

                @endforeach



        </select>
     
        
        @error('cat_id')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>



    <div class="formLaple" >
        <label> السعر</label>
        <input class="form-input"
        value="{{old('price')}}"

        name="price" placeholder=" السعر" />
        
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