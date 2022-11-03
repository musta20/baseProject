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
                            مبالغ مدفوعة بالكامل
                        @break

                        @case(1)
                            مبالغ متبقية
                        @break

                        @case(2)
                            مبالغ مستحقة غير مدفوعى
                        @break

                        @default
                    @endswitch
                </h3>
            </span>
        </div>
        <table>
            <tr>
                <th>#</th>
                <th>رقم الطلب </th>
                <th> المبلغ </th>
                <th> حالة الدفع </th>
                <th> متبقي </th>
                <th> تاريخ الطلب </th>
            </tr>





                @foreach ($reports as $item)
                
                    @switch($type)
                        @case(0)
                            @if ($item->count * $item->servicesNmae->price - $item->payed)
                            @else
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->code }}</td>
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
                                    {{ $item->count * $item->servicesNmae->price - $item->payed }}
                                </td>
                                <td>{{ $item->created_at }}</td>
                            <tr>

                            @endif
                        @break

                        @case(1)
                        @if ($item->count * $item->servicesNmae->price - $item->payed)
                        <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->code }}</td>
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
                            {{ $item->count * $item->servicesNmae->price - $item->payed }}
                        </td>
                        <td>{{ $item->created_at }}</td>
                        </tr>
                        @else

                        @endif

                        @break
                        @case(2)
                        @if ($item->payed==0)
                        <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->code }}</td>
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
                            {{ $item->count * $item->servicesNmae->price - $item->payed }}
                        </td>
                        <td>{{ $item->created_at }}</td>
                        </tr>
                        @else

                        @endif

                        @break


                        @default
                    @endswitch
                @endforeach
        
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
