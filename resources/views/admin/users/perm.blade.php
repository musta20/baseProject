<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>الصلاحيات</h3>
            </span>

            <a href="{{ route('admin.indexrole') }}"
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                اضافة / حذف : وظيفي</a>

        </div>
        <form  method="POST" action="{{ route('admin.addPerm') }}" class=" p-3 bg-slate-100 rounded-md border border-gray-300 ">
            @csrf
            {{-- {!! $filterBox !!} --}}
            <table class="w-full  h-60 text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>

                        <th scope="col" class="px-6 py-3">الصلاحية / الوظيفة </th>
                        @foreach ($perm as $permName)
                        <th scope="col" class="px-6 py-3"> {{ __("messages.".$permName->name) }}</th>
                        @endforeach

                    </tr>


                </thead>
                <tbody class="bg-white divide-y divide-gray-200 ">
                    @foreach ($role as $key => $roleName)

                    <tr>

                        <th class="px-6 py-3" >  {{ __("messages.".$roleName->name) }}</th>
                        @foreach ($perm as $key1 => $permName)
                        <td>

                            @if ($roleName->hasPermissionTo($permName))

                            <input type="checkbox" checked class="hidden" hidden value="0" name=<?php
                                echo '{"permRole":{"role":"' .$roleName->id.'","perm":"'.$permName->id.'"}}';?>
                            >
                            <div class="py-1 px-1 " dir="ltr">
                                <label>
                                    <input type="checkbox" checked name=<?php echo '{"permRole":{"role":"'
                                        .$roleName->id.'","perm":"'.$permName->id.'"}}';?>
                                    value="1">
                                </label>

                            </div>
                            @else



                            <input type="checkbox" checked class="hidden" value="0" name=<?php
                                echo '{"permRole":{"role":"' .$roleName->id.'","perm":"'.$permName->id.'"}}';?> >
                            <div class="py-1 px-1 " dir="ltr">
                                <label>
                                    <input type="checkbox" onchange="chek(this)" name=<?php echo '{"permRole":{"role":"'
                                        .$roleName->id.'","perm":"'.$permName->id.'"}}';?>
                                    value="0">
                                </label>
                            </div>
                            @endif
                        </td>

                        @endforeach
                    </tr>

                    @endforeach

                </tbody>
            </table>
            <hr>
            <div class="py-5">

                <button
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                    type="submit">حفظ</button>

            </div>
        </form>
    </div>
    <script>
        function chek(input)
{
        if (input.checked)
        {
        input.value = 1;
        } else {
        input.value = 0;

        }
}


    </script>

</x-admin.layout>


{{--


<x-admin-layout>
    <h3>الصلاحيات</h3>
    <hr>
    <x-admin-contaner>


        <x-card-message />
        <div class="page-title p-1">

            <a href="{{ route('admin.indexrole') }}" class="btn btn-success"> اضافة / حذف : وظيفي</a>

        </div>

        <form method="POST" class="overflow-scroll" action="{{ route('admin.addPerm') }}">
            @csrf
            <table class="table table-striped  table-centered mb-0 ">
                <thead class="table-dark">
                    <tr>
                        <th>الصلاحية / الوظيفة </th>
                        @foreach ($perm as $permName)
                        <th> {{ __($permName->name) }}</th>
                        @endforeach

                    </tr>
                </thead>
                @foreach ($role as $key => $roleName)

                <tr>

                    <th class="table-dark"> {{ __($roleName->name) }}</th>
                    @foreach ($perm as $key1 => $permName)
                    <td>

                        @if ($roleName->hasPermissionTo($permName))

                    </td>

                    @endforeach
                </tr>

                @endforeach





            </table>
            <div class="page-title p-1">

                <button class="btn btn-success" type="submit">حفظ</button>

            </div>
        </form>


        <script>
            function chek(input)
{
  if (input.checked)
  {
    input.value = 1;
  } else {
    input.value = 0;

  }
}


        </script>



        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout> --}}