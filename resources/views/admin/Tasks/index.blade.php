<x-admin.layout>
    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>جميع المهام :</h3>
            </span>
            <a href="{{ route('admin.Task.create') }}"
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                اسناد مهمة</a>

        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            {!! $filterBox !!}

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            العنوان</th>
                        <th scope="col" class="px-6 py-3">
                            الموظف</th>

                        <th scope="col" class="px-6 py-3">
                            تاريخ البداية 
                        </th>
                        <th scope="col" class="px-6 py-3">
                            
                            تاريخ الانتهاء
                        </th>
                        <th scope="col" class="px-6 py-3">الحالة</th>
                        <th scope="col" class="px-6 py-3">التحكم</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($alltask as $item)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
               

                        <td scope="col" class="px-6 py-3">
                            {{ $item->title }}</td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->user->name }}</td>

                        <td scope="col" class="px-6 py-3">
                            {{ $item->start }}</td>
                        <td scope="col" class="px-6 py-3">
                            {{ $item->end }}</td>
                        <td scope="col" class="px-6 py-3">
                       
                           {{__('messages.'.$option[$item->isdone]->name)}}
                           
                        </td>

                        <td scope="col" class="gap-2 flex px-6 py-3">
                            <a href="{{ route('admin.Task.edit' , $item->id) }}">
                                تعديل</a>
                            <br>
                            <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Task.destroy', $item->id) }}'))"
                                href="#">
                            حذف
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $alltask->links() }}

        </div>
    </div>
</x-admin.layout>