<x-admin.layout>
    <div class="px-5  pt-5">

        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">

            {{-- {!! $filterBox !!} --}}

            <div class="mb-3 w-25 p-2 ">


                <label class="form-label"> اختر نوع السجلات </label>
                <select class="form-select select2 select2-hidden-accessible" id="type">
                    @foreach ($NotifyType as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <br>
                <button onclick="goToPage()" class="btn btn-success btn-sm ms-3 ">عرض</button>
            </div>
            <script>
                function goToPage() {
                    let type = document.getElementById('type');
                    window.location.href = '/admin/showMyNotifyTask/' + type.value;
    
                }
            </script>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>




                    <th scope="col" class="px-6 py-3">
                        الرقم
                    </th>
                    <th scope="col" class="px-6 py-3">
                        الاسم
                    </th>
                    <th scope="col" class="px-6 py-3">
                        الانتهاء
                    </th>
                    <th scope="col" class="px-6 py-3">
                        تاريخ الاصدار
                    </th>
                    <th scope="col" class="px-6 py-3">
                        الصلاحية
                    </th>

                    <th scope="col" class="px-6 py-3">
                        تاريخ الانتهاء
                    </th>


                    <th scope="col" class="px-6 py-3">
                        عرض
                    </th>
                </tr>
            </thead>
            <tbody>


                @foreach ($alltask as $item)
                <tr class="bg-white border-b  hover:bg-gray-50 ">




                    <td scope="col" class="px-6 py-3">{{ $item->number }}</td>

                    <td scope="col" class="px-6 py-3">{{ $item->name }}</td>
                    <td scope="col" class="px-6 py-3">{{ $item->issueAt }}</td>
                    <td scope="col" class="px-6 py-3">{{ $item->duration }}</td>
                    <td scope="col" class="px-6 py-3">{{ $item->exp }}</td>


                    <td scope="col" class="px-6 py-3">
                        <a href="{{ route('admin.editMyNotifyTask' , $item->id ) }}">
                            إجراء

                        </a>

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