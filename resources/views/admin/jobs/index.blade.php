
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
<h3>الوظائف</h3>
<x-card-message />

<a href="{{url('/admin/Jobs/create')}}" class="btn btn-Primary">إضافة وظيفة</a>

</div>
    <table>
        <tr>
            <th>#</th>
            <th>المسمى الوظيفي</th>
            <th>الوصف الوظيفي</th>
            <th>مقر الوظيفة</th>
        </tr>
        @foreach ($alljobs as $item)
        <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->des}}</td>
        <td class="cellControll">
            <a href="{{url('/admin/Jobs/'.$item->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
            <a onclick="OpenDeleteModel(showModel({{$item}}))" href="#"><i class="fa-sharp fa-solid fa-trash"></i></a>
        </td>
        </tr>
            @endforeach
        </table>
</section>
<script>
  function showModel(e) {

   return `<form method='POST' 
        
        action='{{url('/admin/Jobs/${e.id}')}}' >
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