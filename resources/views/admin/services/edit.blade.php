
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>الخدمة</h3>
</div>
<form method="POST" action="{{url('/admin/Services/'.$services->id)}}">
    @csrf
    @method('PUT')
    <div class="formLaple" >
        <label>عنوان الخدمة</label>
        <input class="form-input"
        value="{{$services->name}}"
        name="name" placeholder="عنوان التصنيف" />

        @error('name')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="formLaple" >
        <label> الايقونة</label>
        <input class="form-input"
        value="{{$services->icon}}"

        name="icon" placeholder=" الايقونة" />
        @error('icon')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>


    <span class="btn" onclick="addFile()" >إضافة ملف</span>
    <div id="files" >

    @foreach ($filesInput as $key=>$item)
    <div class='formLaple'>

        <input class='form-input' 
        value="{{$item->name}}" 
        name='files-{{$key}}' 
        placeholder='اسم الملف' />
        
    </div>


    @endforeach

    
        @error("files")
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>













    <div class="formLaple" >
        <label> السعر</label>
        <input class="form-input"
        name="price" placeholder=" السعر" cols="30" rows="10"
        value="{{$services->price}}"
        />
       

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
<script>

    function addFile() {
     //   file.preventDefault();
let file = document.getElementById('files');
let div = document.createElement("div")
div.innerHTML ="<div class='formLaple'><input class='form-input' name='files-"+ file.children.length +"' placeholder='اسم الملف' /></div>";
file.append (div);
        
    }


</script>
@endsection