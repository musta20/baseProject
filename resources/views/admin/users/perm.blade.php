
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
<h3>الصلاحيات</h3>
<x-card-message />

<a href="{{url('/admin/indexrole')}}" class="btn btn-Primary">  اضافة / حذف  : وظيفي</a>

</div>
<form method="POST" class="fullWidth"  action="{{url('/admin/addPerm')}}">
    @csrf    
    <table dir="ltr">
        <tr>
            <th>الصلاحية / الوظيفة </th>
        @foreach ($perm as $permName)
            <th> {{$permName->name}}</th>
        @endforeach

        </tr>
        
            @foreach ($role as $key =>  $roleName)
        <tr>
            <th> {{$roleName->name}}</th>
                @foreach ($perm as $key1 =>  $permName)
                <td>
                   
                    @if ($roleName->hasPermissionTo($permName->id))

                    <input type="checkbox" checked hidden 
                    value="0" 
                    name=<?php echo '{"permRole":{"role":'.$roleName->id.',"perm":'.$permName->id.'}}';?>
                    >


                    <input type="checkbox" 
                    checked
                     name=<?php echo '{"permRole":{"role":'.$roleName->id.',"perm":'.$permName->id.'}}';?>
                     value="1">
                    
                     @else

                 

                    <input type="checkbox" checked hidden 
                    value="0" 
                    name=<?php echo '{"permRole":{"role":'.$roleName->id.',"perm":'.$permName->id.'}}';?>
                    >
                    <input type="checkbox" 
                     onchange="chek(this)"
                     name=<?php echo '{"permRole":{"role":'.$roleName->id.',"perm":'.$permName->id.'}}';?>
                    value="0">
                    
                     @endif
                </td>

                @endforeach
        </tr>
        
            @endforeach
       
    
           
        
   
        </table>
        <div>

            <button class="btn btn-Primary" type="submit" >حفظ</button>

        </div>
</form>
{{--         {{$Users->links('admin.pagination.custom')}}
 --}}
</section>
<script>

function chek(input)
{
  if (input.checked) 
  {
    input.value = 1;
  } else {
    input.value = 0;

  }
}


</script>

<x-model-box></x-model-box>

@endsection