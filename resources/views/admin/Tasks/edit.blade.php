
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>

    <h3>اسناد مهمة</h3>
</div>
<form method="POST" action="{{url('/admin/Task')}}">
    @csrf

    <div class="formLaple" >
        <label> اسم المهمة </label>
        <input class="form-input" name="title"
        value="{{$task->title}}"
        placeholder=" اسم المهمة" />
        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>
    
    
    <div class="formLaple" >
        <label> حالة المهمة : </label>
        <select name="isdone" class="form-input"> 
            @switch($task->isdone)
            @case(0)

            <option value="0">لم يستلم المعهمة بعد</option>
            <option value="1">بداء العمل عليها</option>
            <option value="2"> انجز جزئي للمهمة</option>

            @break

            @case(1)
            <option value="1">بداء العمل عليها</option>
            <option value="0">لم يستلم المعهمة بعد</option>
            <option value="2"> انجز جزئي للمهمة</option>
            <option value="3">   تم الانجاز</option>

            @break


            @case(2)
            <option value="2"> انجز جزئي للمهمة</option>
            <option value="1">بداء العمل عليها</option>
            <option value="0">لم يستلم المعهمة بعد</option>
            <option value="3">   تم الانجاز</option>

            @break



            @case(3)
            <option value="3">   تم الانجاز</option>
            <option value="2"> انجز جزئي للمهمة</option>
            <option value="1">بداء العمل عليها</option>
            <option value="0">لم يستلم المعهمة بعد</option>
            
            @break


            @default
                
        @endswitch

   
        </select>

        @error('user_id')
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>











    <div class="formLaple" >
        <label>الى الموظف : </label>
        <select name="user_id" class="form-input">
            
        <option value="{{$task->id}}">{{$task->user->name}}</option>
            @foreach ($users as $item)

            @if ($item->id != $task->id)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endif

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
        placeholder=" وصف المهمة ">{{$task->des}}</textarea>
        @error('des')
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>


    
    <div class="formLaple" >
        <label>  تاريخ بداء المهمة </label>
        <input
        
        type="date" 
        class="form-input" 
        name="start"
        value="{{$task->start}}"
        placeholder=" اسم المهمة"

         />
        @error('start')
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>

    <div class="formLaple" >
        <label>تاريخ إنهاء المهمة </label>
        <input type="date" class="form-input" name="end"
        value="{{$task->end}}"
        placeholder=" اسم المهمة" />
        @error('end')
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