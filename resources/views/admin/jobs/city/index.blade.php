
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
<h3>المدن</h3>
<x-card-message />

<a href="{{url('/admin/JobCity/create')}}" class="btn btn-Primary">إضافة مدينة</a>

</div>
    <table>
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>التحكم</th>
        </tr>
        @foreach ($jobcity as $item)
        <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td class="cellControll">
            <a  href="{{url('/admin/JobCity/'.$item->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
            <a onclick="OpenDeleteModel(showModel({{$item}}))" href="#"><i class="fa-sharp fa-solid fa-trash"></i></a>
        </td>
        </tr>
            @endforeach
        </table>
        {{$jobcity->links('admin.pagination.custom')}}

</section>
<script>
  function showModel(e) {

   return `<form method='POST' 
        
        action='{{url('/admin/JobCity/${e.id}')}}' >
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