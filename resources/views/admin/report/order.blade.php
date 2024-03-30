
<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>تقارير الطلبات</h3>
            </span>
            <form method="POST" 
            {{-- target="_blank"  --}}
            class="flex gap-2 " 
            action="{{ route('admin.Report.store') }}">
                @csrf
                <input hidden name="reporttype" value="ORDER" />

                <x-admin.select-input  name="type" label="نوع التقرير" :options="App\Enums\OrderStatus::cases()" />
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
            {{-- {!! $filterBox !!} --}}
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
                            {{__("messages.".App\Enums\OrderStatus::getname($item->type))}}
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


{{-- 

<x-admin-layout>
    <h3>تقارير الطلبات</h3>
    <hr>
    <x-admin-contaner>

        <form method="POST" target="_blank" class="D-flex w-25" 
        action="{{ route('admin.Report.store') }}">
            @csrf

            <input hidden name="reporttype" value="ORDER" />

            <div class="mb-3">
              <h3>
                نوع التقرير
              </h3>
                <hr>
                <select class="form-select select2 select2-hidden-accessible" name="type">
                    <option value="6">عام</option>
                    <option value="0">قيد الانتظار</option>
                    <option value="1"> تحت المعالجة</option>
                    <option value="2">المكتملة</option>
                    <option value="3">المستلمة</option>
                    <option value="4">ملغي</option>
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
                <button class="btn btn-primary">انشاء التقرير</button>
            </div>
        </form>
        <x-card-message />


        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">            
                <tr>
                <th>#</th>
                <th>نوع التقرير</th>
                <th>تاريخ التقرير</th>
                <th> من</th>
                <th>الى </th>
                <th> التحكم</th>
            </tr>
            </thead>
            @foreach ($orderReport as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                      
                        {{App/Enums/ReportType::getname($item->type)}}

                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->from }}</td>
                    <td>{{ $item->to }}</td>
                    <td class="cellControll">
                        <a target="_blank" href="{{ url('storage/pdf/' . $item->file) }}"><i
                                class="mdi mdi-pencil"></i></a>
                        <a onclick="OpenDeleteModel(showModel('{{ $item->id }}','{{ route('admin.Report.destroy' , $item->id) }}'))" href="#"><i
                                class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $orderReport->links('admin.pagination.custom') }}



        <x-model-box></x-model-box>
    </x-admin-contaner>
</x-admin-layout>

 --}}
