<section class="mainPage">
    <form id="" class="contact-form" method="POST" action="{{ url('/SendContact') }}">
        @csrf
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
        <h3> تواصل معنا
        </h3>
        <div class="TowInput">
            <div>
                <input name="fname" id="value1" required placeholder="الاسم الاول *" class="input-form w-90" />
                <small>
                    @error('fname')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </small>
            </div>
            <div>
                <input placeholder="الاسم الاخير *" name="lname" id="value1" required class="input-form w-90" />
                <small>
                    @error('lname')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </small>
            </div>
        </div>
        <div class="TowInput">
            <div>
                <input placeholder=" الجوال * " name="phone" id="value1" required class="input-form w-90" />
                <small>
                    @error('phone')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </small>
            </div>
            <div>
                <input placeholder=" البريد الالكتروني * " name="email" required id="value1"
                    class="input-form w-90" />
                <small>
                    @error('email')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </small>
            </div>
        </div>
        <div class="input-box">
            <textarea required style="height: 8em !important;" placeholder="اضف وصف الطلب * " class="input-form" name="msg"
                id="form-message" rows="20"></textarea>
            <small>
                @error('msg')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </small>
        </div>
        <center>
            <button class="btn w-50" type="submit" name="submit"> إرسال </button>
        </center>

    </form>
</section>
