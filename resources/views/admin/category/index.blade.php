<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>التصنيفات</h3>
            </span>
            <a href="{{ route('admin.Category.create') }}"
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                انشاء تصنيف</a>

        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            {{-- {!! $filterBox !!} --}}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            الاسم
                        </th>



                        <th scope="col" class="px-6 py-3">التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allcategory as $item)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td scope="col" class="px-6 py-3">
                            {{ $item->title }}</td>




                        <td scope="col" class="px-6  flex gap-3 py-3">
                            <a href="{{ route('admin.Category.edit' , $item->id) }}">
                                تعديل
                            </a>
                            <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Category.destroy' , $item->id) }}'))"
                                href="#">
                                حذف
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $allcategory->links() }}

        </div>
    </div>
</x-admin.layout>


{{--  --}}