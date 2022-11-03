
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">


    <h3> المهام </h3>
<x-card-message />

<a href="{{url('/admin/TasksNotify/create')}}" class="btn btn-Primary"> اسناد مهمة</a>

</div>
    <table>
        <tr>
           
            <th>#</th>
            <th>الاسم</th>
            <th>الرقم</th>
            <th>تاريخ الاصدار </th>
            <th>مدة التجديد </th>
            <th> التحكم </th>
     
        </tr>
            
       
        @foreach ($alltask as $item)
        <tr>
        <td>{{$item->id}}</td>
          
        <td>{{$item->name}}</td>

        <td>{{$item->number}}</td>

        <td>{{$item->issueAt}}</td>

        <td>{{$item->duration}}</td>

        <td class="cellControll">
            <a  href="{{url('/admin/TasksNotify/'.$item->id.'/edit')}}"><i class="fa-regular fa-pen-to-square"></i></a>
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
        
        action='{{url('/admin/TasksNotify/${e.id}')}}' >
        @method('DELETE')
        @csrf
        <div class='formLaple' >
            <label> هل انت متأكد من حذف العنصر</label>
            <h3>${e.name}</h3>
            <button type='submit' class='btn btn-Danger' >حذف</button>
        </div>
        </form>`
    
  }
</script>

<x-model-box></x-model-box>

@endsection

