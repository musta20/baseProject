
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>اسناد مهمة</h3>
</div>
<form method="POST" enctype="multipart/form-data" action="{{url('/admin/Task')}}">
    @csrf

    <div class="formLaple" >
        <label> اسم المهمة </label>
        <input class="form-input" name="title"
        value="{{old('title')}}"
        placeholder=" اسم المهمة" />
        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>

    <div class="formLaple" >
        <label>الى الموظف : </label>
        <select name="user_id" class="form-input">
            @foreach ($users as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>

        @error('user_id')
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>
    <div class="formLaple" >
        <label> وصف المهمة </label>
        <textarea class="form-input" name="des" rows="12"
        placeholder=" وصف المهمة ">{{old('des')}}</textarea>
        @error('des')
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>

    <div class="formLaple" >
        <label>  تاريخ بداء المهمة </label>
        <input type="date" class="form-input" name="start"
        value="{{old('start')}}"
        placeholder=" اسم المهمة" />
        @error('start')
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>

    <div class="formLaple" >
        <label>  تاريخ إنهاء المهمة </label>
        <input type="date" class="form-input" name="end"
        value="{{old('end')}}"
        placeholder=" اسم المهمة" />
        @error('end')
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>

    <span class="btn" onclick="addFile()">إضافة ملف</span>

    <div id="files">

        @error('files')
            <span class="helper">
                {{ $message }}
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

        let file = document.getElementById('files');
        let div = document.createElement("div")
        div.innerHTML = "<div class='formLaple'><input class='form-input' name='attachment-" + file.children.length +"' type='file' placeholder='اسم الملف' /></div>";
        file.append(div);

    }
</script>
    
@endsection