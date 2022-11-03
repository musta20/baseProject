<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <section class="list border">
        <div class="controller">
            <h3>
                تقرير الطلبات
                من
                {{ $from }}
                الى
                {{ $to }}
            </h3>
<span> 
            <h3>
                نوع التقرير :
                @switch($type)
                    @case(0)
                        قيد الانتظار
                    @break
                    @case(1)
                        جاري العمل عليه
                    @break
                    @case(2)
                        جاهز للتسليم
                    @break
                    @case(3)
                        تم التسليم
                    @break
                    @case(4)
                        ملغي
                    @break
                    @case(6)
                        عام
                    @break
                    @default
                @endswitch
            </h3>
        </span>
        </div>
        <table>
            <tr>
                <th>#</th>
                <th>اسم العميل </th>
                <th> نوع الخدمة </th>
                <th> المبلغ </th>
                <th> حالة الدفع </th>
                <th> حالة الطلب </th>
                <th> تاريخ الطلب </th>
            </tr>
            @foreach ($reports as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->servicesNmae->name }}</td>
                    <td>{{ $item->count * $item->servicesNmae->price }} ر.س</td>
                    <td>
                        @if ($item->count * $item->servicesNmae->price - $item->payed)
                            مدفوع
                            {{ $item->payed }}
                            ر.س
                        @else
                            مدفع بالكامل
                        @endif
                    </td>
                    <td>
                        @switch($item->status)
                            @case(0)
                                قيد الانتظار
                            @break

                            @case(1)
                                جاري العمل عليه
                            @break

                            @case(2)
                                جاهز للتسليم
                            @break

                            @case(3)
                                تم التسليم
                            @break

                            @case(4)
                                ملغي
                            @break

                            @default
                        @endswitch
                    </td>
                    <td>{{ $item->created_at }}</td>
            @endforeach
            </tr>
        </table>
    </section>
</body>

</html>
<style>
    body {
        width: 99%;
        margin: 0px;
        padding: 0.5em;
        background-color: #f4ffff;

    }

    .border {
        border-radius: 0.4em;
        box-shadow: 0 0 .1em .1em #e4e1e1;
    }


    .list {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border-radius: 0.4em;
        width: 100%;
        background-color: #f9f9f9;

    }

    .controller {
        padding: 0.5em;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: row;
    }

    table {
        width: 100%;
        background-color: #f4ffff;


    }


    td {
        padding: 0.2em;
        text-align: center;
    }

    th {
        background-color: #4dd0e1;
        border-radius: 0.2em;
        margin: 0.5em;
        color: #f4ffff;
    }
</style>
