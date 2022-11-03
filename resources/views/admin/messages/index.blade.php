
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">


    @if ($type==1)
    <h3>الرسائل المرسلة </h3>

    @else
    <h3>صندوق الوارد</h3>

    @endif
<x-card-message />

<a href="{{url('/admin/Messages/create')}}" class="btn btn-Primary"> ارسال رسالة</a>

</div>
    <table>
        <tr>
            <th>#</th>
            @if ($type==1)
            <th>الى</th>

            @else
            <th>المرسل</th>

            @endif
            <th>العنوان</th>
            <th>التاريخ</th>
            <th>التحكم</th>
        </tr>
            
       
        @foreach ($Messages as $key => $item)
        <tr>
        <td>{{$item->id}}</td>
        @if ($type==1)
        <td>
          {{$item->too->name}}
           </td>

        @else
        <td>{{$item->fromm->name}}</td>

        @endif
        <td>{{$item->title}}</td>
        <td>{{$item->created_at}}</td>
  
        <td class="cellControll">
            <a  href="{{url('/admin/Messages/'.$item->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
            <a onclick="OpenDeleteModel(showModel({{$item}}))" href="#"><i class="fa-sharp fa-solid fa-trash"></i></a>
        </td>
        </tr>
            @endforeach
        </table>
        {{$Messages->links('admin.pagination.custom')}}

</section>
<script>
  function showModel(e) {

   return `<form method='POST' 
        
        action='{{url('/admin/Messages/${e.id}')}}' >
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

