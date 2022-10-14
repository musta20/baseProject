
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
<h3>الخدمات</h3>
<x-card-message />

<a href="{{url('/admin/Slide/create')}}" class="btn btn-Primary">إضافة سلايد</a>

</div>
    <table>
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>الوصف</th>
            <th>الصورة</th>
            <th>الرابط</th>
            <th>التحكم</th>
        </tr>
        @foreach ($allslide as $item)
        <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->des}}</td>
        <td><a target="blank" href="{{url('storage/'.$item->img)}}" ><img width="100" src="{{url('storage/'.$item->img)}}" /></td>
        <td>{{$item->url}}</td>
        <td class="cellControll">
            <a  href="{{url('/admin/Slide/'.$item->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
            <a onclick="OpenDeleteModel(showModel({{$item}}))" href="#"><i class="fa-sharp fa-solid fa-trash"></i></a>
        </td>
        </tr>
            @endforeach
        </table>
</section>
<script>
  function showModel(e) {

   return `<form method='POST' 
        
        action='{{url('/admin/Slide/${e.id}')}}' >
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