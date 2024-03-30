<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>المدن</h3>
            </span>
            <a
            href="{{ url('admin.JobCity.create') }}" 
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                إضافة مدينة</a>

        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            {{-- {!! $filterBox !!} --}}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                     

                        <th scope="col" class="px-6 py-3">الاسم</th>
س
                        <th scope="col" class="px-6 py-3">التحكم</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($alljobs as $item)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td scope="col" class="px-6 py-3">
                            {{ $item->title }}</td>




                        <td scope="col" class="px-6  flex gap-3 py-3">
                            <a href="{{ route('admin.Jobs.index' , $item->id) }}">
                               تعديل
                            </a>
                            <a  onclick="OpenDeleteModel(showModel('{{$item->title}}','{{route('admin.Jobs.destroy',$item->id)}}'))" 
                                >
                                حذف
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $alljobs->links() }}

        </div>
    </div>
</x-admin.layout>








<x-admin-layout>
    <h3>المدن</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />
        <div class="page-title p-1">
            <a href="{{ url('/admin/JobCity/create') }}" class="btn btn-success">إضافة مدينة</a>
        </div>
        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            @foreach ($jobcity as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="cellControll">
                        <a href="{{ url('/admin/JobCity/' . $item->id) }}">
                            <i class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.JobCity.destroy' , $item->id) }}'))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $jobcity->links('admin.pagination.custom') }}



        <x-model-box></x-model-box>


    </x-admin-contaner>
</x-admin-layout>
