<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>العروض الاعلانية</h3>
            </span>
            <a href="{{ route('admin.Slide.create') }}"
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
               انشاء عرض</a>

        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            {{-- {!! $filterBox !!} --}}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            الاسم
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الوصف
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الصورة
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الرابط
                        </th>
                       
                        <th scope="col" class="px-6 py-3">التحكم</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($allslide as $item)
                <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td scope="col" class="px-6 py-3">
                            {{ $item->title }}</td>

                            <td scope="col" class="px-6 py-3">
                                {{ $item->des }}</td>
                            
                       
                                              
                                <td scope="col" class="px-6 py-3">
                                    <a target="blank" href="{{url('storage/'.$item->img)}}" ><img width="100" src="{{url('storage/'.$item->img)}}" />
                                    </td>
                                    <td scope="col" class="px-6 py-3">
                                        {{$item->url}}</td>
                                    
                  
                        <td scope="col" class="px-6  flex gap-3 py-3">
                            <a href="{{route('admin.Slide.edit',$item->id)}}">
                            تعديل
                        </a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Slide.destroy' , $item->id) }}'))"  href="#">
                          حذف
                        </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $allslide->links() }}

        </div>
    </div>
</x-admin.layout>
{{-- 
<x-admin-layout>
    <h3> السلايدات</h3>
    <hr>
    <x-admin-contaner>
<x-card-message />
<div class="page-title p-1" >

<a href="{{route('admin.Slide.create')}}" class="btn btn-success">إضافة سلايد</a>

</div>
<table class="table  table-striped table-centered mb-0">
    <thead class="table-dark">        
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>الوصف</th>
            <th>الصورة</th>
            <th>الرابط</th>
            <th>التحكم</th>
        </tr>
    </thead>
        @foreach ($allslide as $item)
        <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->des}}</td>
        <td><a target="blank" href="{{url('storage/'.$item->img)}}" ><img width="100" src="{{url('storage/'.$item->img)}}" /></td>
        <td>{{$item->url}}</td>

        <td class="table-action">
            <a  href="{{route('admin.Slide.edit',$item->id)}}">
                <i class="mdi mdi-pencil"></i></a>
            <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Slide.destroy' , $item->id) }}'))" href="#">
                <i class="mdi mdi-delete"></i></a>
        </td>

        </tr>
            @endforeach
        </table>




<x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout> --}}
