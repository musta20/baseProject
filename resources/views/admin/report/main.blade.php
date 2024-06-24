@extends('admin.layout.index')
@section('content')
    <section class="boxs border">

        <a href="{{ route('report.orderReport') }}" >
            <i class="fa-solid fa-list fa-2x"></i>
            <h3> تقارير العمليات </h3>
        </a>

        <a href="{{ route('admin.cashReport') }}" >
            <i class="fa-solid fa-clipboard-check fa-2x"></i>
            <h3>  تقارير الحسابات </h3>
        </a>

        <a href="{{ route('admin.billReport') }}" >
            <i class="fas fa-truck fa-2x"></i>
            <h3>  الفواتير</h3>
        </a>












    </section>
@endsection
