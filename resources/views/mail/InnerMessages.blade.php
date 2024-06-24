<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body style="width: 100%;margin: 0px;background-color: #e8e8e8;color: #4a4a4a" class="body">
    <table class="main"
        style="margin: 3em !important;text-align: center;display: flex;flex-direction: column;gap: 0.2em;padding: 2em;align-items: center;justify-content: center;background-color: #fff;margin: 0px auto;border: 1px solid #f9f9f9;">
        <tr>
            <td style="text-align: center;">
                <img width="150" src="{{ url('/imgs/h.png') }}">

            </td>
        </tr>
            <tr>
                <td>
                    {{ $Title }}
                </td>
            </tr>

        </tr>
        <tr>
            <p>{{ $Message }}</p>

        </tr>
        <tr>
            <td>
                هذه الرسالة من موقع {{ config('app.name') }} للمذيد من الخدمات الرجاء زيارة موقعنا .

                نتمني لك يوما سعيد و نسعد بخدمتكم دوما .
            </td>
        </tr>
        <tr class="footer" style="padding: 1em;text-align: center;">
            شركة {{ config('app.name') }} - المملكة العربية السعودية
            <a style="width:95%;text-decoration: none;color: #4a4a4a;" href="{{ url('/about') }}"> للاستعلام حول هذه
                الرسالة
            </a>
            كل الحقوق محفوظة ل {{ config('app.name') }} للخدمات الطلابية.
        </tr>
    </table>
</body>

</html>
