
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
<h3>الخدمات</h3>
<x-card-message />

<a href="{{url('/admin/Services/create')}}" class="btn btn-Primary">إضافة خدمة</a>

</div>
    <table>
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>السعر</th>
            <th>الايقونة</th>
            <th>التحكم</th>
        </tr>
        @foreach ($allServices as $item)
        <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->price}}</td>
        <td>
            <i class="{{$item->icon}}"></i>
       </td>
        <td class="cellControll">
            <a  href="{{url('/admin/Services/'.$item->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
            <a onclick="OpenDeleteModel(showModel({{$item}}))" href="#"><i class="fa-sharp fa-solid fa-trash"></i></a>
        </td>
        </tr>
            @endforeach
        </table>
        {{$allServices->links('admin.pagination.custom')}}

</section>
<script>
  function showModel(e) {

   return `<form method='POST' 
        
        action='{{url('/admin/Services/${e.id}')}}' >
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