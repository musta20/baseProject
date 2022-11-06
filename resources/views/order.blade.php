<x-layout>
    <script src="{{ asset('js/lib/jquery-3.6.1.slim.min.js') }}"></script>
    <section class="mainPage">
        <form id="checkout-form" enctype="multipart/form-data" method="POST"
            action="{{ url('/SaveOrder/' . $services->id) }}" class="colorTexetFooter">
            @csrf
            <h3>تقديم الطلب</h3>

            @if(session()->has('messages'))
            <div class="alert alert-success">
                <p><strong>{{session('messages')}} </strong></p>
                
            </div>
        @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <p><strong>حدث خطاء</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="input-box">
                <div>الخدمة الطلوبة </div>
                <input class="input-form" value="{{ $services->name }}" disabled />
            </div>
            <div class="input-box">
                <input class="input-form" value="{{ old('name') }}" placeholder=" الاسم * " name="name" />
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>
            <div class="TowInput">
                <input type="number" value="{{ old('phone') }}" name="phone" placeholder="رقم الجوال *"
                    class="input-form" />
                @error('phone')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
                <input type="email" name="email" value="{{ old('email') }}" placeholder="البريد الالكتروني *"
                    class="input-form" />
                @error('email')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="input-box">
                <input  name="title" value="{{ old('title') }}" placeholder="عنوان الطلب *"
                    class="input-form" />
                @error('title')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="TowInput">
                <div>
                    <div>* العدد </div>
                    <input type="number" value="{{ old('count') }}" name="count" id="value1"
                        class="input-form input" />
                    @error('count')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <div> السعر *</div>
                    <input class="input-form" type="number" name="price" value="{{ $services->price }}" readonly
                        id="value2" />

                </div>
                <div>
                    <div> الإجمالي *</div>
                    <input type="text" disabled="disabled" id="result" class="input-form" />
                    <small></small>
                </div>
            </div>
            <div class="input-box">
                <div>*الوقت المفضل للإستلام</div>
                <input type="date" value="{{ old('time') }}" name="time" class="input-form" />
                @error('time')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            @if (!$files->isEmpty())
                <div> الملفات المطلوبة </div>
                @foreach ($files as $key => $item)
                    <div>{{ $item->name }}</div>
                    <div class="input-box">
                        <input type="file" name="{{ $key }}" id="image" class="input-form" />
                        <small></small>
                    </div>
                    @error($key)
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                @endforeach


            @endif

            <div class="TowInput">
                <div>
                    <span>طرق الدقع</span>

                    <select class="input-form" name="receipt">
                        @foreach ($payment as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('receipt')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <span>طرق التوصيل</span>

                    <select class="input-form" name="cash">
                        @foreach ($cash as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('cash')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-box">
                <div> اضف وصف الطلب</div>
                <textarea style="height: 8em !important;" placeholder="وصف الطلب بالكامل *  " class="input-form" name="des"
                    id="form-message" rows="7" cols="20">{{ old('des') }}</textarea>
                @error('des')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="input-form" style="height: auto !important; ">
                <b>المواصلة وتأكيد طلبك تعني الموافقة على
                    <a href="terms.php">شروط واحكام الموقع اضغط هنا لقراءة الشروط والاحكام </a></b>
                <br />
                <br />
                <button class="btn " type="submit" name="submit"> تأكيد الطلب </button>
            </div>
            <script>
                $(document).ready(function() {
                    $(".input").keyup(function() {
                        var val1 = +$("#value1").val();
                        var val2 = +$("#value2").val();
                        $("#result").val(val1 * val2);
                    });


                    var i = 2;
                    $('.add').on('click', function() {
                        if (i < 6) {
                            var field = '<br><div> File   ' + i + ':  <input type="file" name="image' + i +
                                '"></div>';
                            $('.appending_div').append(field);
                            i = i + 1;
                        }
                    })
                });

                $('.btn-ftf-rd-sm-p-dp').prop('disabled', !$('.tab1_chk:checked')
                    .length); //initially disable/enable button based on checked length
                $('input[type=checkbox]').click(function() {
                    console.log($('.tab1_chk:checkbox:checked').length);
                    if ($('.tab1_chk:checkbox:checked').length > 0) {
                        $('.tab1_btn').prop('disabled', false);
                    } else {
                        $('.tab1_btn').prop('disabled', true);
                    }
                });
            </script>
        </form>
        <style>
            .helper {
                text-shadow: none;
                color: #df1e00;
            }
        </style>
    </section>
</x-layout>
