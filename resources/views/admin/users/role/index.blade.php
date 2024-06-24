

<x-admin.layout>
    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>الصلاحية :</h3>
            </span>




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
                    @foreach ($role as $item)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">


                        <td scope="col" class="px-6 py-3">
                            {{ $item->name }}</td>


                        <td scope="col" class="gap-2 flex px-6 py-3">


                                    <a onclick="OpenDeleteModel(showModel('{{ $item->NAME }}','{{ route('admin.removerole' , $item->id) }}'))" href="#">                                    حذف</a>

                            حذف</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class=" p-3 bg-slate-100  rounded-md border border-gray-300 ">
            <form method="POST" class="p-1 w-75" action="{{ route('admin.addrole') }}">
                @csrf
                <h3>إضافة </h3>
                <hr>
                <div class="mb-3">
                    <x-admin.input-card name="role" placeholder="الاسم" />

                    @error('name')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="mb-3 p-1">
                        <div class="px-3 pb-3">

                            <button type="submit"
                            class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">

                                حفظ</button>

                        </div>
                    </div>
            </form>
        </div>
    </div>
</x-admin.layout>


{{--
<x-admin-layout>
    <h3>الموظفين</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />

        <table class="table  table-striped table-centered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم </th>
                    <th>التحكم</th>
                </tr>
            </thead>
            @foreach ($role as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ __($item->name) }}</td>
                    <td class="table-action">
                        <a onclick="OpenDeleteModel(showModel('{{ $item->NAME }}','{{ route('admin.removerole' , $item->id) }}'))" href="#"><i
                                class="mdi  mdi-delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        <hr>
        <form method="POST" class="p-1 w-75" action="{{ route('admin.addrole') }}">
            @csrf
            <h3>إضافة </h3>
            <hr>
            <div class="mb-3">
                <label class="form-label"> الاسم</label>
                <input class="form-control" name="role" placeholder="الاسم" />
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror


                <div class="mb-3 p-1">

                    <div class="px-3 pb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-send me-1"></i> حفظ</button>

                        <a type="button" href="{{ url('admin/indexrole') }}" class="btn btn-light">الغاء</a>
                    </div>
                </div>

        </form>

        </div>



        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout> --}}
