@extends('admin.layout.index')
@section('content')
    <section class="boxs border">

        <a href="{{url('/admin/showOrderList/0')}}" >
            <i class="fa-solid fa-list fa-2x"></i>
            <h3>الطلبات الجديدة</h3>
        </a>

        <a href="{{url('/admin/showOrderList/1')}}" >
            <i class="fa-solid fa-clipboard-check fa-2x"></i>
            <h3>الطلبات المكتملة</h3>
        </a>

        <a href="{{url('/admin/showOrderList/2')}}" >
            <i class="fas fa-truck fa-2x"></i>
            <h3>الطلبات المسلتلمة</h3>
        </a>

        <a href="{{url('/admin/showOrderList/3')}}" >
            <i class="fas fa-trash  fa-2x"></i>
            <h3>الطلبات الملغية</h3>
        </a>

        <a href="{{url('/admin/Payment')}}" >
            <i class="fas fa-truck fa-2x"></i>
            <h3> طرق الدفع</h3>
        </a>

        <a href="{{url('/admin/Delivery')}}" >
            <i class="fas fa-truck fa-2x"></i>
            <h3> طرق التوصيل</h3>
        </a>
    </section>
@endsection
