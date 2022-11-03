<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>login</title>

</head>

<body>
    <section class="mainBody">

        <main class="login">
            <form method="POST" class="border" action="{{ url('/login') }}">
                @csrf
                <div class="formLaple">
                    <label>البريد الالكتروني </label>
                    <input class="form-input" type="email" name="email" placeholder="البريد الالكتروني " />

                    @error('email')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>
                <div class="formLaple">
                    <label> كلمة المرور</label>
                    <input class="form-input" type="password" name="password" placeholder=" كلمة المرور" />

                    @error('password')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>
                <div class="btnLogin">
                    <button type="submit" class="btn btn-Primary">تسجيل الدخول</button>

                </div>
            </form>
            <div class="backLogin ">
                <img width="500" src="{{ asset('imgs/h.png') }}" />
            </div>
        </main>

    </section>


</body>

</html>
