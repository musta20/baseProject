<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('icons/css/all.min.css') }}">
    <link href="{{ asset('Dashboard/app-saas-rtl.min.css') }}" rel="stylesheet" type="text/css" id="app-style">
    <title>تسجيل الدخول</title>
</head>

<body>
    <section class="mainBody">

        <main class="loginCard border">
            <form method="POST" class="loginform w-50" action="{{ url('/login') }}">
                @csrf
                <h4>تسجيل الدخول
                    <hr>
                </h4>
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
                <div class="mb-3">
                    <label class="form-label">البريد الالكتروني </label>
                    <input class="form-control  " type="email" name="email" placeholder=" البريد الالكتروني " />
                    {{--  @error('email')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror --}}
                </div>
                <div class="mb-3">
                    <label class="form-label"> كلمة المرور</label>
                    <input class="form-control  " type="password" name="password" placeholder=" كلمة المرور" />
                    {{--    @error('password')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror --}}
                </div>

                <div class="mb-3">
                    <input class="  " type="checkbox" name="remember" />
                    <label class="form-label">تذكرني </label>
                </div>
  {{--               <div class="mb-3">
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">
                    </div>

                </div> --}}

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
                </div>
            </form>
            <div class="backLogin w-50">
                <img class="fill" src="{{ asset('imgs/h.png') }}" />
            </div>
        </main>
    </section>
</body>

</html>
<style>
    .loginCard {
        background-color: white;
        border-radius: 15px;
        /*         box-shadow: .1em .1em .1em .1em #919191;
 */
        margin: 5em auto;
        display: flex;
        width: 60%;
        align-content: center;
    }

    form {
        margin: .1em;
        padding: 2em;
        display: flex;
        flex-direction: column;
        align-content: center;
        align-items: center;
    }

    .loginform {
        display: flex;
        flex-direction: column;
        align-content: center !important;
        justify-content: center !important;
    }

    .backLogin {
        border-right: 1px solid #dee2e6;
        border-radius: 15px 0px 0px 15px;

        background-image: linear-gradient(to right, rgb(211, 223, 236), rgb(70, 96, 142));

    }

    .fill {

        /*         height: 100%;
 */
        width: 100%;
        object-fit: cover;
    }


    body {
        background-color: whitesmoke;

        /*         background-image: linear-gradient(to left, rgb(220, 220, 220),#87afd8);
 */
    }
</style>
