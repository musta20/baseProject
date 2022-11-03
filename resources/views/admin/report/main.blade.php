@extends('admin.layout.index')
@section('content')
    <section class="boxs border">

        <a href="{{url('/admin/orderReport')}}" >
            <i class="fa-solid fa-list fa-2x"></i>
            <h3> تقارير العمليات </h3>
        </a>

        <a href="{{url('/admin/cashReport')}}" >
            <i class="fa-solid fa-clipboard-check fa-2x"></i>
            <h3>  تقارير الحسابات </h3>
        </a>

        <a href="{{url('/admin/billReport')}}" >
            <i class="fas fa-truck fa-2x"></i>
            <h3>  الفواتير</h3>
        </a>

    










    </section>
@endsection
