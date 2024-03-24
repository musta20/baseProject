
<x-admin-layout>

    <h3>الخدمات</h3>

    <hr>
    <x-admin-contaner>
<x-card-message />
<div class="page-title p-1" >

<a href="{{route('admin.Services.create')}}" class="btn btn-success">إضافة خدمة</a>

</div>

<table class="table  table-striped table-centered mb-0">
   
    {!! $filterBox !!}
    <thead class="table-dark">        
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>السعر</th>
{{--             <th>الايقونة</th>
 --}}            <th>التحكم</th>
        </tr>
    </thead>
        @foreach ($allServices as $item)
        <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->price}}</td>
{{--         <td>
            <i class="{{$item->icon}}"></i>
       </td> --}}
       <td class="table-action">
        <a  href="{{route('admin.Services.edit',$item->id)}}"><i class="mdi mdi-pencil"></i></a>
            <a onclick="OpenDeleteModel(showModel('{{ $item->name }}','{{ route('admin.Services.destroy' , $item->id) }}'))" href="#">
                <i class="mdi mdi-delete"></i></a>
        </td>
        </tr>
            @endforeach
        </table>
        {{$allServices->links('admin.pagination.custom')}}



<x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>