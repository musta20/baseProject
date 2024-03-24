
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
<h3>انواع السحلات</h3>
<x-card-message />

<a href="{{route('admin.NotifyType.create')}}" class="btn btn-Primary">إضافة مدينة</a>

</div>
    <table>
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>التحكم</th>
        </tr>
        @foreach ($NotifyType as $item)
        <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td class="cellControll">
            <a  href="{{route('admin.NotifyType.edit',$item->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
            <a onclick="OpenDeleteModel(showModel('{{ $item->name }}','{{ route('admin.NotifyType.destroy' , $item->id) }}'))" href="#"><i class="fa-sharp fa-solid fa-trash"></i></a>
        </td>
        </tr>
            @endforeach
        </table>
        {{$NotifyType->links('admin.pagination.custom')}}

</section>


<x-model-box></x-model-box>

@endsection