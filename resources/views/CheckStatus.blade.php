
<x-layout>


    <section class="services">
        <div class="contentServices">
                                <form method="POST"
                                action="{{url('/CheckOrderStatus')}}"
                                class="colorTexetFooter">
                                @if (session()->has('messages'))
                                <div class="alert alert-success">
                                    <p><strong>{{ session('messages') }} </strong></p>
                
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
                                <h2 > الإستعلام عن حالة الطلب </h2>

                                @csrf

    
                                    <input class="input-form" type="number" id="o_code" name="code" placeholder="ادخل رقم الطلب *">
                                  <br />
                                    <button name="add" type="submit" class="btn" style="margin-right:15px;">استعلام</button>
                                </form>
                                </div>
                                </section>
</x-layout>