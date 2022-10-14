@extends('admin.layout.index')
@section('content')
    <section class="boxs border">

        <a href="{{url('/admin/basic')}}" >
            <i class="fa-solid fa-list fa-2x"></i>
            <h3> إعداد الموقع الاساسية</h3>
        </a>

        <a href="{{url('/admin/Contact')}}" >
            <i class="fa-solid fa-clipboard-check fa-2x"></i>
            <h3> بيانات التواصل</h3>
        </a>

        <a href="{{url('/admin/Slide')}}" >
            <i class="fa-solid fa-clipboard-check fa-2x"></i>
            <h3> السلايدات</h3>
        </a>

        <a href="{{url('/admin/Social')}}" >
            <i class="fas fa-truck fa-2x"></i>
            <h3> وسائل التواصل</h3>
        </a>

        <a href="{{url('/admin/Number')}}" >
            <i class="fas fa-trash  fa-2x"></i>
            <h3> عرض الاحصاءات</h3>
        </a>









    </section>
@endsection
