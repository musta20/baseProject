<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ sprintf('%04d', $order->id) }}</title>
</head>

<body>
    <style>
        .small {
            font-size: 8px;
        }

        body {
            margin-top: -50px;
        }

        h3 {
            font-size: 25px;
        }

        .center {
            width: 80%;
            text-align: center;
        }

        .center p {
            font-weight: 900;
        }

        .Colorth {
            background-color: #bdbdbd;
        }

        table,
        td,
        tr {
            text-align: center;
            border: 0.5px outset #000;
        }

        .w-50 {
            width: 50%;
            text-align: center;
        }

        .noborder {
            border: none;
        }

        td {
            text-align: center;
            padding: 5px;
        }

        .title {
            margin-top: -30px;
        }
    </style>

    <body>
        <br />
        <center>
            <div class="center">
                <img width="150" src={{ $dataUri }} />
                <h3 class="title ">فاتورة</h3>
                <p>
                    مؤسسة سليمان باسم الدلالي للخدمات الطلابية
-                    {{ $setting->adress }}
                </p>
            </div>
        </center>
        <div>التاريخ و الوفت: {{ date('Y-m-d') }}</div>
        <div>رقم الفاتورة : #{{ sprintf('%04d', $order->id) }}</div>
        <div>مدفوع الى : <br /> {{ $order->name }}</div>
        <div> رقم الجوال : <br /> {{ $order->phone }}</div>
        <br />
        <table cellspacing="1" cellpadding="3">
            <tr class="Colorth">
                <th style="width:25%">كود المنتج</th>
                <th>الوصف</th>
                <th>الكمية </th>
                <th>السعر </th>
                <th> الاجمالي</th>
            </tr>
            <tr>
                <td>{{ $order->id }} </td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->count }}</td>
                <td>{{ $order->price }}
                    <span class="small">
                        ر.س
                    </span>
                </td>
                <td>{{ $order->count * $order->price }}
                    <span class="small">
                        ر.س
                    </span>
                </td>
            </tr>
            <tr class="Colorth">
                <td class="noborder">الاجمالي</td>
                <td class="noborder"></td>
                <td class="noborder"></td>
                <td class="noborder"></td>
                <td class="noborder">{{ $order->count * $order->price }}
                    <span class="small">
                        ر.س
                    </span>
                </td>
            </tr>
            <tr class="">
                <td class="noborder">المدفوع</td>
                <td class="noborder"></td>
                <td class="noborder"></td>
                <td class="noborder"></td>
                <td class="noborder"> {{ $order->payed }}
                    <span class="small">
                        ر.س
                    </span>
                </td>
            </tr>
            <tr class="">
                <td class="noborder">المتبقي</td>
                <td class="noborder"></td>
                <td class="noborder"></td>
                <td class="noborder"></td>
                <td class="noborder"> {{ $order->count * $order->price - $order->payed }}
                    <span class="small">
                        ر.س
                    </span>
                </td>
            </tr>
        </table>
        <p>
            {{ $setting->billterm }}
        </p>
    </body>
</html>
