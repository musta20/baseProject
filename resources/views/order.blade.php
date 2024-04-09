<x-layout>

    <form method="POST" action="{{ route('SaveOrder' , $services->id) }}" enctype="multipart/form-data">

        @csrf

        <section dir="rtl" x-data="{price:0,total:0}" class="py-10 mx-auto w-4/6 h-auto ">
            <h2 class="text-3xl text-gray-700">تقديم طلب خدمة</h2>
            <hr class="my-5  border-slate-400">
            <div class="mb-5 flex gap-2">
                <x-admin.input-card value="{{$services->name}}" label="الخدمة المطلوبة" disabled />
                <x-admin.input-card value="{{ old('name') }}" name="name" label="الاسم كامل" placeholder="الاسم كامل" />
            </div>

            <div class="mb-5 flex gap-2">
                <x-admin.input-card name="email" type="email" value="{{ old('email') }}" label="البريد الالكتروني"
                    placeholder="ex: 0lO6f@example.com" />
                <x-admin.input-card name="phone" type="number" value="{{ old('phone') }}" label="رقم  الجوال"
                    placeholder="+966 50 000 0000" />
            </div>

            <div class="mb-5 flex gap-2">
                <x-admin.input-card name="title" label="عنوان الطلب" value="{{ old('title') }}"
                    placeholder="عنوان الطلب" />

                <x-admin.input-card 
                
                name="count" 
                
                placeholder="العدد" 

                type="number"
         
                @change="$refs.result.value = $refs.value1.value * $refs.value2.value"

                value="{{ old('count') }}" x-ref="value1" label="عدد مرات طلب الخدمة" />
            </div>

            <div class="mb-5 flex gap-2">

                <x-admin.input-card placeholder="العدد" type="number" value="{{ $services->price }}" readonly
                    name="price" x-ref="value2" label="السعر" />

                <x-admin.input-card disabled="disabled" x-ref="result"   label="الاجمالي" />


            </div>

            <div class="flex gap-5 p-3">

                <x-admin.input-card type="date" value="{{ old('time') }}" name="time" label="*الوقت المفضل للإستلام" />

            </div>



            <div class=" gap-5 p-3">
                <span>الملفات المطلوبة</span>
                @if (!$services->files->isEmpty())

                @foreach ($services->files as $key => $item)
                <x-admin.input-card type="file" name="{{ $key }}" label="{{ $item->name }}" class="input-form" />
                @endforeach

                @endif
            </div>
            <div class=" gap-5 p-3">
                <x-admin.select-input name="payment_id" :options="$services->payments" label=" طرق الدفع " />


                <x-admin.select-input name="delivery_id" :options="$services->deliveries" label=" طرق التوصيل " />
            </div>

            <x-admin.textarea-card name="des" placeholder="التفاصيل" cols="30" rows="5"
                label="اضف وصف للطلب (اختياري)" />
            <div class="input-form" style="height: auto !important; ">
                <b>المواصلة وتأكيد طلبك تعني الموافقة على
                    <a href="{{route('term')}}">شروط واحكام الموقع اضغط هنا لقراءة الشروط والاحكام </a></b>
                <br />
                <br />
                <button class="btn " type="submit" name="submit"> تأكيد الطلب </button>
            </div>

            <hr class="my-5  border-slate-400">

        </section>

    </form>


    <script>
        const calculateResult = () => {
            const value1Input = document.getElementById('#value1');
            const value2Input = document.getElementById('value2');
            const resultInput = document.getElementById('result');

            console.log(value1Input);
                            const val1 = +value1Input;
                            
                const val2 = +value2Input.value;
                resultInput.value = val1 * val2;
            };

        // $(document).ready(function() {

         

        //     value1Input.addEventListener('input', calculateResult);


        //     var i = 2;
        //     $('.add').on('click', function() {
        //         if (i < 6) {
        //             var field = '<br><div> File   ' + i + ':  <input type="file" name="image' + i +
        //                 '"></div>';
        //             $('.appending_div').append(field);
        //             i = i + 1;
        //         }
        //     })
        // });

        // $('.btn-ftf-rd-sm-p-dp').prop('disabled', !$('.tab1_chk:checked')
        //     .length); //initially disable/enable button based on checked length
        // $('input[type=checkbox]').click(function() {
        //     console.log($('.tab1_chk:checkbox:checked').length);
        //     if ($('.tab1_chk:checkbox:checked').length > 0) {
        //         $('.tab1_btn').prop('disabled', false);
        //     } else {
        //         $('.tab1_btn').prop('disabled', true);
        //     }
        // });
    </script>
</x-layout>