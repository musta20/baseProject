
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
<h3>{{$title}}</h3>
<x-card-message />


</div>
    <table>
        <tr>
            <th>#</th>
            <th>عنوان الطلب</th>
            <th>الاسم</th>

            @if ($type!=0)
            <th>الفاتورة</th>

            @else
                
            @endif
            
            
            <th> تاريخ الاعتماد</th>
            <th> التحكم</th>
        </tr>
        @foreach ($AllOrder as $item)
        <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->name}}</td>
        <td>
            @if (!$item->approve_time)
                غير معتد بعد
            @else
            {{$item->approve_time}}

            @endif
        
        </td>
        @if ($type!=0)
        <td>
            <a target="_blank" href="{{url('admin/BillInnerPrint/'.$item->id)}}" >الفاتورة الداخلية</a>
            <a target="_blank" href="{{url('admin/Billprint/'.$item->id)}}" >فاتورة الزبون</a>
        </td>
        @else
            
        @endif

        <td class="cellControll">
            <a  href="{{url('/admin/Order/'.$item->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
            <a onclick="OpenDeleteModel(showModel({{$item}}))" href="#"><i class="fa-sharp fa-solid fa-trash"></i></a>
        </td>
        </tr>
            @endforeach
        </table>
        {{$AllOrder->links('admin.pagination.custom')}}
</section>
<script>
  function showModel(e) {

   return `<form method='POST' 
        
        action='{{url('/admin/Order/${e.id}')}}' >
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