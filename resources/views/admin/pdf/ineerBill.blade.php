<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{sprintf('%04d', $order->id)}}</title>
</head>
<body>

<style>
    h3{font-size:25px;}
    .center{text-align: center;}
        .Colorth{  background-color: #18396e; }
        table ,td ,tr { border: 1px outset #18396e; }
        .Notable{ border: none; }
    .w-50{width:50%; text-align: center;}
        .noborder{   border:none; }
        td{ text-align: center;  }
        .titleCase{ background-color: #4b7bc9; color:#f1f1f1; }
    </style>
    <body>
        <br>
       <hr>
       <table class="Notable" style="width: 100%;">
        <tr class="Notable">
            <td class="Notable">
                <div>
                    مؤسسة سليمان باسم الدلالي للخدمات الطلابية 
                   <br>
                        التاريخ و الوفت: {{date('Y-m-d')}}
                        <br>
                        رقم الفاتورة : #{{sprintf('%04d', $order->id)}}
                     </div></td> <td class="Notable">
                <img width="150" style="margin-left:-50px" src={{ $dataUri }} />
            </td>
        </tr>
       </table>


            <br/>

    <table style="width: 100%;" cellpadding="10"   >
        <tr >
        <td width="100" class="titleCase" > اسم العميل</td>
        <td colspan="4"  >	{{$order->name}}</td>
        </tr>
        <tr>
        <td class="titleCase">نوع العميل</td>
        <td colspan="4" >غير محدد</td>
        </tr>
        <tr>
        <td class="titleCase">رقم الجوال </td>
        <td colspan="4">	{{$order->phone}}</td>
    
        </tr>
        
        <tr>
        <td class="titleCase">البريد الالكتروني </td>
        <td colspan="4">	{{$order->email}}</td>
        </tr>
    
        <tr >
            <td colspan="1" class="titleCase"> طريقة الاستلام</td>
            <td colspan="2" >{{$order->delivery->name}}</td>
            <td colspan="1" class="titleCase">  تاريخ التسليم</td>
            <td  colspan="2">{{$order->time}}</td>
        </tr>
    
        <tr>
            <td class="titleCase"> طريقة الدفع </td>
            <td colspan="4" >{{$order->payment->name}}</td>
        </tr>
    
        <tr>
            <td class="titleCase"> اسم الموظف </td>
            <td colspan="4">{{$order->user->name}} </td>
        </tr>
        
        <tr>
            <td class="titleCase">  نوع الطلب  </td>
            <td colspan="4">{{$order->servicesNmae->name}}</td>
        </tr>
        <tr>
            <td class="titleCase">  عنوان الطلب  </td>
            <td colspan="4">{{$order->title}}</td>
        </tr>
        <tr>
            <td  height="130" class="titleCase">  وصف الطلب  </td>
            <td colspan="4">{{$order->des}}</td>
        </tr>
        <tr >
            <td colspan="2" class="titleCase">   الكمية      </td>
            <td colspan="2" class="titleCase">  السعر   </td>
            <td colspan="2" class="titleCase">   الاجمالي  </td>
        </tr>
        <tr >
            <td  colspan="2" >{{$order->count}}</td>
            <td colspan="2"  >{{$order->servicesNmae->price}} ر.س</td>
            <td colspan="2" > {{$order->count * $order->servicesNmae->price}}  ر.س  </td>
        </tr>
    
        <tr>
            <td  colspan="2">الاجمالي</td>
            <td  colspan="3">{{$order->count * $order->servicesNmae->price}}ر.س </td>
        </tr>
        <tr>
            <td colspan="2">المدفوع  </td>
            <td colspan="3">{{$order->payed }}ر.س</td>
        </tr>
        <tr> 
            <td colspan="2">المتبقي</td>
            <td  colspan="3">{{($order->count * $order->servicesNmae->price) - $order->payed }}    ر.س    </td>
        </tr>
    </table>
    <br>
    </body>
    
</body>
</html>