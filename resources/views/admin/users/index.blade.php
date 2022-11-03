
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
<h3>الموظفين</h3>
<x-card-message />

<a href="{{url('/admin/Users/create')}}" class="btn btn-Primary"> اضافة موظف</a>

</div>
    <table>
        <tr>
            <th>#</th>
            <th>الاسم </th>
            <th>الصلاحية</th>
            <th>البريد الالكتروني </th>

            <th>التحكم</th>
        </tr>
        @foreach ($Users as $item)
        <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        @if ($item->hasAnyRole($allRole))
        <td>{{$item->roles->pluck('name')[0]}}</td>

        @else
            <td>
                لايوجد صلاحية
            </td>
        @endif


        <td>{{$item->email}}</td>
        <td class="cellControll">
            
                @if ($item->hasAnyRole($allRole))
                    @if ($item->getRoleNames()[0]=='مدير')

                    <a href="{{url('/admin/Users/'.$item->id.'/edit/')}}"><i class="fa-regular fa-pen-to-square"></i></a>
               
                    @else


                    <a href="{{url('/admin/Users/'.$item->id.'/edit/')}}"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a onclick="OpenDeleteModel(showModel({{$item}}))" href="#"><i class="fa-sharp fa-solid fa-trash"></i></a>

            
                    @endif 

                @else                  


                <a href="{{url('/admin/Users/'.$item->id.'/edit/')}}"><i class="fa-regular fa-pen-to-square"></i></a>
                <a onclick="OpenDeleteModel(showModel({{$item}}))" href="#"><i class="fa-sharp fa-solid fa-trash"></i></a>

                @endif
            
         </td>
        </tr>
            @endforeach
        </table>
        {{$Users->links('admin.pagination.custom')}}

</section>
<script>
  function showModel(e) {

   return `<form method='POST' 
        
        action='{{url('/admin/Users/${e.id}')}}' >
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