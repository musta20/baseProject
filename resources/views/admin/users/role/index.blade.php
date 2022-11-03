
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
<h3>الموظفين</h3>
<x-card-message />


</div>
    <table>
        <tr>
            <th>#</th>
            <th>الاسم </th>
            <th>التحكم</th>
        </tr>
        @foreach ($role as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td class="cellControll">
            <a onclick="OpenDeleteModel(showModel({{$item}}))" href="#"><i class="fa-sharp fa-solid fa-trash"></i></a>
         </td>
        </tr>
            @endforeach
        </table>
<hr>
        <form method="POST" class="border miniform"  action="{{url('/admin/addrole')}}">
            @csrf
            <h3>إضافة </h3>
            <div class="formLaple" >
                <label> الاسم </label>
                <input class="form-input" name="role" placeholder="الاسم" />
                @error('name')
                <span class="helper">
                {{$message}}
                </span>
                @enderror


            <div>
                <button class="btn btn-Primary" >حفظ</button>

           
        </form>

    </div>
</section>
<script>
  function showModel(e) {

   return `<form method='POST' 
        
        action='{{url('admin/rmrole/${e.id}')}}' >
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