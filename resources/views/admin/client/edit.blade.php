<x-admin.layout>
    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>تعليق الزبون</h3>
            </span>
            <a href="{{ route('admin.Clients.index') }}"
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">

                الغاء</a>

        </div>
        <form method="POST" class="w-full mx-auto" action="{{ route('admin.Clients.update' , $client->id) }}"
            class="flex gap-2">



            @csrf
            @method('PUT')
            <div class=" p-3 bg-slate-100 w-full mx-auto rounded-md border border-gray-300 ">

               
                    <div class="mx-auto w-1/2 gap-3 ">
                        <div class="flex gap-3 ">
                            <label>الاسم</label>
                            {{ $client->name }}

                        </div>

                        <div class="flex gap-3 ">
                            <label>التعليق</label>

                            {{ $client->des }}

                      
                        </div>
                        <div class="flex gap-3 ">
                            <label>التقييم</label>

                            {{ $client->rate }}

                        </div>
                     


                    
                    <div class="flex gap-3 pt-5">

                        <x-admin.select-input :options="$statusoption" name="status" selected="{{$client->status}}"
                            label="الحالة" />
                    </div>
                    <hr>
                    <br>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">

                        حفظ</button>



                    </div>



        </form>
    </div>

</x-admin.layout>
{{--
<x-admin-layout>

    <h3>تعليق الزبون</h3>

    <hr>
    <x-admin-contaner>

        <x-card-message />

        <div class="orderDitels">
            <table>
                <tr>
                    <td> مقدم الطلب : </td>
                    <td>{{ $client->name }}</td>
                </tr>
                <tr>
                    <td> التعليق : </td>
                    <td>{{ $client->des }}</td>
                </tr>
                <tr>
                    <td> التقييم : </td>
                    <td>{{ $client->rate }}</td>
                </tr>

                <tr>
                    <td> الحالة : </td>
                    <td>@switch($client->status)
                        @case(1)
                        مخفي

                        @break
                        @case(2)
                        تم العرض
                        @break
                        @default

                        @endswitch</td>
                </tr>
                <tr>
                    <td> تاريخ التقييم : </td>
                    <td>{{ $client->created_at }}</td>
                </tr>
                <tr>
                    <td> بيانات الطلب : </td>
                </tr>
                <tr>
            </table>

            <form method="POST" action="{{ route('admin.Clients.update' , $client->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label"> تغيير حالة الطلب</label>
                    <select class="form-select select2 select2-hidden-accessible w-25" name="status">
                        @switch($client->status)
                        @case('1')
                        <option value="1"> مخفي </option>
                        <option value="2"> تم العرض</option>
                        @break

                        @case('2')
                        <option value="2"> تم العرض</option>

                        <option value="1"> مخفي </option>
                        @break

                        @default
                        <span class="status">Trash</span>
                        @endswitch


                    </select>

                    @error('status')
                    <span class="helper">
                        {{ $message }}
                    </span>
                    @enderror

                </div>
                <br>




                <div class="mb-3">

                    <div class="px-3 pb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-send me-1"></i> حفظ</button>

                        <a type="button" href="{{ url('admin/Clients') }}" class="btn btn-light">الغاء</a>
                    </div>
                </div>


        </div>



        </form>
        </div>
        <script>
            function selectpay(t) {
                console.log(t)
                const payed = document.getElementById('payed');

                if (t.value == 1 || t.value == 2) {
                    payed.hidden = false;
                } else {
                    //    payed.hidden = true;

                }

                //payed.diplay="true"

            }
        </script>
    </x-admin-contaner>
</x-admin-layout> --}}