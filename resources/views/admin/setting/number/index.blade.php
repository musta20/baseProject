
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
<h3>روابط التواصل</h3>
<x-card-message />

<a href="{{url('/admin/Number/create')}}" class="btn btn-Primary">إضافة رابط</a>

</div>
    <table>
        <tr>
            <th>#</th>
            <th>الصورة</th>
            <th>النص</th>
            <th>الرقم</th>
            <th>التحكم</th>
        </tr>
        @foreach ($allnumbers as $item)
        <tr>
        <td>{{$item->id}}</td>

        <td>{{$item->img}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->number}}</td>
        <td class="cellControll">
            <a  href="{{url('/admin/Number/'.$item->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
            <a onclick="OpenDeleteModel(showModel({{$item}}))" href="#"><i class="fa-sharp fa-solid fa-trash"></i></a>
        </td>
        </tr>
            @endforeach
        </table>
</section>
<script>
  function showModel(e) {

   return `<form method='POST' 
        
        action='{{url('/admin/Number/${e.id}')}}' >
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