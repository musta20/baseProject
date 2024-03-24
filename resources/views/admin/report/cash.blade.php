<x-admin-layout>
    <h3>تقارير الحسابات</h3>
    <hr>
    <x-admin-contaner>

        <form method="POST" target="_blank" class="D-flex w-25"
         action="{{ route('admin.Report.store') }}">
            @csrf
            <input hidden name="reporttype" value="CASH" />

            <div class="mb-3">
                نوع التقرير
                <select class="form-select select2 select2-hidden-accessible" name="type">
                    <option value="0"> مبالغ مدفوعة بالكامل</option>
                    <option value="1"> مبالغ متبقية </option>
                    <option value="2">مبالغ مستحقة غير مدفوعى</option>
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


        </div>
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
                        @switch($item->type)
                            @case(0)
                            مبالغ مدفوعة بالكامل                            
                            @break

                            @case(1)
                            مبالغ متبقية 
                            @break

                            @case(2)
                                جاهز للتسليم
                            @break

                            @case(3)
                            
                            مبالغ مستحقة غير مدفوعى                            
                            @break
                            
                            @default
                        @endswitch

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
        </section>


        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>
