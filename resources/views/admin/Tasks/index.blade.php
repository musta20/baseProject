
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">


    <h3> المهام </h3>
<x-card-message />

<a href="{{url('/admin/Task/create')}}" class="btn btn-Primary"> اسناد مهمة</a>

</div>
    <table>
        <tr>
           
            <th>#</th>
            <th>العنوان</th>
            <th>الموظف</th>
            <th>البداية </th>
            <th>الانتهاء </th>
            <th>الحالة</th>
            <th>التحكم</th>

        </tr>
            
       
        @foreach ($alltask as $item)
        <tr>
        <td>{{$item->id}}</td>
          
        <td>{{$item->title}}</td>

        <td>{{$item->user->name}}</td>

        <td>{{$item->start}}</td>
        <td>{{$item->end}}</td>
        <td>@switch($item->isdone)
            @case(0)
                لم يستلم المعهمة بعد
                @break
                @case(1)
                بداء العمل عليها
                @break
                @case(2)
                انجز جزئي للمهمة
                @break
            @default
                
        @endswitch</td>
  
        <td class="cellControll">
            <a  href="{{url('/admin/Task/'.$item->id.'/edit')}}"><i class="fa-regular fa-pen-to-square"></i></a>
            <a onclick="OpenDeleteModel(showModel({{$item}}))" href="#"><i class="fa-sharp fa-solid fa-trash"></i></a>
        </td>
        </tr>
            @endforeach
        </table>
        {{$alltask->links('admin.pagination.custom')}}

</section>
<script>
  function showModel(e) {

   return `<form method='POST' 
        
        action='{{url('/admin/Clients/${e.id}')}}' >
        @method('DELETE')
        @csrf
        <div class='formLaple' >
            <label> هل انت متأكد من حذف العنصر</label>
            <h3>${e.title}</h3>
            <button type='submit' class='btn btn-Danger' >حذف</button>
        </div>
        </form>`
    
  }
</script>

<x-model-box></x-model-box>

@endsection

