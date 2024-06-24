
<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>الفواتير </h3>
            </span>
            <form
            {{-- target="_blank"  --}}
            class="flex gap-2 "
            method="GET"  action="{{ route('admin.billReport') }}"
            >
                @csrf
                <input hidden name="reporttype" value="ORDER" />

                <x-admin.select-input  name="type" label="نوع التقرير" :options="App\Enums\BillType::cases()" />
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
                           رقم الفاتورة
                        </th>

                        <th scope="col" class="px-6 py-3">
                         نوع الفاتورة
                        </th>

                        <th scope="col" class="px-6 py-3">
                            تاريخ الفاتورة
                        </th>

                        <th scope="col" class="px-6 py-3">التحكم</th>

                    </tr>
                </thead>
                <tbody>
                @foreach ($orderReport as $item)
                <tr class="bg-white border-b  hover:bg-gray-50 ">
                    <td>#{{ sprintf('%04d', $item->id) }}</td>

                        <td scope="col" class="px-6 py-3">
                            {{ __("messages.".App\Enums\BillType::getname($item->type)) }}
                        </td>

                            <td scope="col" class="px-6 py-3">
                                {{ $item->created_at }}</td>


                        <td scope="col" class="px-6  flex gap-3 py-3">
                            <a target="_blank" href="{{ url('storage/pdf/' . $item->file) }}">عرض الفاتورة
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

{{--
<x-admin-layout>
    <h3> الفواتير المصدرة</h3>
    <hr>
    <x-admin-contaner>
        <form method="GET" class="D-flex w-25" action="{{ route('admin.billReport') }}">
            <div class="mb-3">
                نوع الفاتورة
                <select class="form-select select2 select2-hidden-accessible" name="type">
                    <option value="0"> فاتورة زبون </option>
                    <option value="1"> فاتورة داخلية</option>
                </select>
            </div>
                <div class="mb-3">
                    <label class="form-lable">من</label>
                    <input class="form-control" type="date" name="from" />
                    @error('from')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                <div class="mb-3">
                    <label class="form-lable"> الى</label>
                    <input class="form-control" type="date" name="to" />
                    @error('to')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>



                <div class="mb-3">
                    <label></label>
                    <button class="btn btn-primary">عرض</button>
                </div>

        </form>
        <x-card-message />


        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>رقم الفاتورة</th>
                    <th>نوع الفاتورة</th>
                    <th>تاريخ الفاتورة</th>
                    <th> اسم العميل</th>
                    <th> التحكم</th>
                </tr>
            </thead>
            @foreach ($orderReport as $item)
                <tr>
                    <td>#{{ sprintf('%04d', $item->id) }}</td>
                    <td>
                        @switch($item->type)
                            @case(0)
                                فاتورة زبون
                            @break

                            @case(1)
                                فاتورة داخلية
                            @break

                            @default
                        @endswitch

                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->to }}</td>
                    <td class="cellControll">
                        <a target="_blank" href="{{ url('storage/pdf/' . $item->file) }}"><i
                                class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Report.destroy' , $item->id) }}'))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $orderReport->links('admin.pagination.custom') }}



        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout> --}}