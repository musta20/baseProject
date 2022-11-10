<x-admin-layout>
    <h3>الصلاحيات</h3>
    <hr>
    <x-admin-contaner>


<x-card-message />
<div class="page-title p-1" >

<a href="{{url('/admin/indexrole')}}" class="btn btn-success">  اضافة / حذف  : وظيفي</a>

</div>

<form method="POST" class="overflow-scroll"  action="{{url('/admin/addPerm')}}">
    @csrf    
    <table  class="table table-striped  table-centered mb-0 ">
        <thead class="table-dark">        
            <tr>
            <th>الصلاحية / الوظيفة </th>
        @foreach ($perm as $permName)
            <th> {{__($permName->name)}}</th>
        @endforeach

        </tr>
        </thead>
            @foreach ($role as $key =>  $roleName)
            
        <tr>

            <th class="table-dark"> {{__($roleName->name)}}</th>
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
        <div class="page-title p-1" >

            <button class="btn btn-success" type="submit" >حفظ</button>

        </div>
</form>
{{--         {{$Users->links('admin.pagination.custom')}}
 --}}

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

    </x-admin-contaner>
</x-admin-layout>