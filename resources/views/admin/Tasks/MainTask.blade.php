<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>جميع المهام :</h3>
            </span>


        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            {!! $filterBox !!}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>



                        <th scope="col" class="px-6 py-3">
                            العنوان
                        </th>
                        <th scope="col" class="px-6 py-3">
                            البداية
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الانتهاء
                        </th>
                        <th scope="col" class="px-6 py-3">
                            تاريخ الانشاء
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الحالة
                        </th>

                        <th scope="col" class="px-6 py-3">
                            التحكم
                        </th>
                    </tr>
                </thead>
                <tbody>


                        @foreach ($alltask as $item)
                        <tr class="bg-white border-b  hover:bg-gray-50 ">

                            <td  scope="col" class="px-6 py-3">{{ $item->title }}</td>

                            <td  scope="col" class="px-6 py-3">{{ $item->start }}</td>
                            <td  scope="col" class="px-6 py-3">{{ $item->end }}</td>
                            <td  scope="col" class="px-6 py-3">{{ $item->created_at->diffForHumans() }}</td>
                            <td  scope="col" class="px-6 py-3">
                                {{ __('messages.'.$option[$item->isdone]->name) }}


                            </td>

                            <td  scope="col" class="px-6 py-3">
                                <a href="{{ route('admin.admin.showTask' , $item->id) }}">
                                إجراء
                                </i></a>
                            </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $alltask->links('admin.pagination.custom') }}
        </div>
    <x-model-box></x-model-box>
    </div>
</x-admin.layout>