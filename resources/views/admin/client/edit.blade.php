<x-admin-layout>

<h3>تعليق الزبون</h3>

    <hr>
    <x-admin-contaner>

        <x-card-message />

            <div class="orderDitels">
                <table>
                    <tr>
                        <td> مقدم الطلب  : </td>
                        <td>{{ $client->name }}</td>
                    </tr>
                    <tr>
                        <td>  التعليق  : </td>
                        <td>{{ $client->des }}</td>
                    </tr>
                    <tr>
                        <td> التقييم  : </td>
                        <td>{{ $client->rate }}</td>
                    </tr>

                    <tr>
                        <td> الحالة  : </td>
                        <td>{{ $client->status }}</td>
                    </tr>
                    <tr>
                        <td> تاريخ التقييم  : </td>
                        <td>{{ $client->created_at }}</td>
                    </tr>
                    <tr>
                        <td> بيانات الطلب  : </td>
                    </tr>
                    <tr>
                </table>

                <form method="POST" action="{{ url('/admin/Clients/' . $client->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label"> تغيير حالة الطلب</label>
                        <select class="form-select select2 select2-hidden-accessible w-25" name="status">
                            @switch($client->status)
                                @case('1')
                                    <option value="1">غير ظاهر </option>
                                    <option value="2"> تم العرض</option>
                                @break

                                @case('2')
                                    <option value="2"> تم العرض</option>

                                    <option value="1">غير ظاهر </option>
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
</x-admin-layout>