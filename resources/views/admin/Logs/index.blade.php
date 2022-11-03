
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
<h3>التتبع</h3>
<x-card-message />
</div>
اسم الموظف
    <select  onchange="goToUser()" id="users" name="user">
        <option  value="0">اختر اسم الموظف</option>

        @foreach ($users as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <br />
    <table>
        <tr>
            <th>#</th>
            <th>قسم الاجراء</th>
            <th>نوع الاجراء</th>
            <th>التاريخ</th>
            <th>عرض</th>
        </tr>
        @foreach ($AllLogs as $item)
        <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->log_name}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->created_at}}</td>
        <td>
            <a href="/admin/Logs/{{$item->id}}">عرض</a>

        </td>
        </tr>
            @endforeach
        </table>
        {{$AllLogs->links('admin.pagination.custom')}}
</section>
<script>
  function showModel(e) {

   return `<form method='POST' 
        
        action='{{url('/admin/Order/${e.id}')}}' >
        @method('DELETE')
        @csrf
        <div class='formLaple' >
            <label> هل انت متأكد من حذف العنصر</label>
            <h3>${e.id}</h3>
            <button type='submit' class='btn btn-Danger' >حذف</button>
        </div>
        </form>`
    
  }

  function goToUser() {
        const users =  document.getElementById('users')

        document.location = '/admin/LogsList/'+users.value;
    }
</script>

<x-model-box></x-model-box>

@endsection