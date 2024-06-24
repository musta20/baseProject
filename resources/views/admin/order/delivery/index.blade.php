<x-admin.layout>
    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>وسائل التوصيل :</h3>
            </span>
            <a href="{{ route('admin.Delivery.create') }}"
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                إضافة </a>

        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            {{-- {!! $filterBox !!} --}}

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            الاسم</th>


                        <th scope="col" class="px-6 py-3">التحكم</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($delivery as $item)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">




                        <td scope="col" class="px-6 py-3">
                            {{ $item->name }}</td>



                        <td scope="col" class="gap-2 flex px-6 py-3">
                            <a href="{{ route('admin.Delivery.edit' , $item->id) }}">
                                تعديل</a>
                            <br>
                            <a onclick="OpenDeleteModel(showModel('{{ $item->name }}','{{ route('admin.Delivery.destroy', $item->id) }}'))"
                                href="#">
                            حذف
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $delivery->links() }}

        </div>
    </div>
</x-admin.layout>




