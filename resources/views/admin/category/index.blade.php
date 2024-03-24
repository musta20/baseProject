<x-admin-layout>
    <h3> التصنيفات  </h3>
    <hr>
    <x-admin-contaner>
<x-card-message />
<div class="page-title p-1" >

<a href="{{route('admin.Category.create')}}" class="btn btn-success">إضافة تصنيف</a>
</div>

<table class="table  table-striped table-centered mb-0">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>الاسم</th>
{{--             <th>الايقونة</th>
 --}}            <th>التحكم</th>
        </tr>
    </thead>
        @foreach ($allcategory as $item)
        <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->title}}</td>
{{--         <td> 
            <i class="{{$item->icon}}"></i>
        </td> --}}
        <td class="table-action">
            <a  href="{{route('admin.Category.edit',$item->id)}}">
                <i class="mdi mdi-pencil"></i></a>
            <a onclick="OpenDeleteModel(showModel('{{$item->title}}','{{route('admin.Category.destroy',$item->id)}}'))" href="#">
                <i class="mdi mdi-delete"></i></a>
        </td>
        </tr>
            @endforeach
        </table>
        {{$allcategory->links('admin.pagination.custom')}}



<x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout>