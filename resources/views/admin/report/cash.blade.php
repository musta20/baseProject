
<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>تقارير الحسابات</h3>
            </span>
            <form method="POST"
            {{-- target="_blank"  --}}
            class="flex gap-2 "
            action="{{ route('admin.Report.store') }}">
                @csrf
                <input hidden name="reporttype" value="ORDER" />

                <x-admin.select-input  name="type" label="نوع التقرير" :options="App\Enums\CashReport::cases()" />
                <x-admin.input-card  type="date" name="from" label="من" />
                <x-admin.input-card  type="date" name="to" label="الى" />
                <button
                class="bg-blue-500 h-10 my-8 w-60 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                >إنشاء تقرير</button>

            </form>
            {{-- <a href="{{ route('admin.Task.create') }}"
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                اسناد مهمة</a> --}}

        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            {!! $filterBox !!}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            نوع التقرير
                        </th>
                        <th scope="col" class="px-6 py-3">
                            تاريخ التقرير
                        </th>
                            <th scope="col" class="px-6 py-3">
                                من
                            </th>
                        <th scope="col" class="px-6 py-3">
                            الى
                        </th>
                        <th scope="col" class="px-6 py-3">التحكم</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($orderReport as $item)
                <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td scope="col" class="px-6 py-3">
                            {{ __("messages.".App\Enums\CashReport::getname($item->type)) }}
                        </td>

                            <td scope="col" class="px-6 py-3">
                                {{ $item->created_at }}</td>
                            <td scope="col" class="px-6 py-3">
                                {{ $item->from }}
                            </td>
                        <td scope="col" class="px-6 py-3">
                            {{ $item->to }}

                        </td>
                        <td scope="col" class="px-6  flex gap-3 py-3">
                            <a target="_blank" href="{{ url('storage/pdf/' . $item->file) }}">عرض التقرير
                            </a>
                            <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Report.destroy' , $item->id) }}'))" href="#">
                                حذف
                              </a>
                    </td>

                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orderReport->links() }}

        </div>
    </div>
</x-admin.layout>

