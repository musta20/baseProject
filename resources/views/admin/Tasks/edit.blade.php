<x-admin-layout>

    <h3>تعديل مهمة</h3>

    <x-admin-contaner>
    <x-card-message></x-card-message>

<form method="POST" class="w-75" action="{{url('/admin/Task/'.$task->id)}}">
    @csrf
@method('PUT')
    <div class="mb-3" >
        <label class="form-label"> اسم المهمة </label>
        <input class="form-control" name="title"
        value="{{$task->title}}"
        placeholder=" اسم المهمة" />
        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>
    
    
    <div class="mb-3" >
        <label class="form-label"> حالة المهمة : </label>
        <select name="isdone" class="form-select select2 select2-hidden-accessible"> 
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











    <div class="mb-3" >
        <label class="form-label">الى الموظف : </label>
        <select name="user_id" class="form-select select2 select2-hidden-accessible">
            
        <option value="{{$item->id}}">{{$task->user->name}}</option>
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

    <div class="mb-3" >
        <label class="form-label"> وصف المهمة </label>
        <textarea class="form-control" name="des" rows="12"
        placeholder=" وصف المهمة ">{{$task->des}}</textarea>
        @error('des')
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>


    
    <div class="mb-3" >
        <label class="form-label">  تاريخ بداء المهمة </label>
        <input
        
        type="date" 
        class="form-control" 
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

    <div class="mb-3" >
        <label class="form-label">تاريخ إنهاء المهمة </label>
        <input type="date" class="form-control" name="end"
        value="{{$task->end}}"
        placeholder=" اسم المهمة" />
        @error('end')
        <span class="helper">
        {{$message}}
        </span>
        @enderror
    </div>
    
    


    <div class="mb-3">

        <div class="px-3 pb-3">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-send me-1"></i> حفظ</button>

            <a type="button" href="{{ url('admin/Task') }}" class="btn btn-light">الغاء</a>
        </div>
    </div>

</form>

    </x-admin-contaner>
</x-admin-layout>
