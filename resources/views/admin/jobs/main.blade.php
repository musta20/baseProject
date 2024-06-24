@extends('admin.layout.index')
@section('content')
    <section class="boxs border">

        <a href="{{ route('admin.Jobs.index') }}" >
            <i class="fa-solid fa-list fa-2x"></i>
            <h3> جميع الوظائف </h3>
        </a>

        <a href="{{ route('admin.JobApp.index') }}" >
            <i class="fa-solid fa-clipboard-check fa-2x"></i>
            <h3> طلبات التوظيف</h3>
        </a>

        <a href="{{ route('admin.JobCity.index') }}" >
            <i class="fa-solid fa-map fa-2x"></i>
             <h3> مناطق التوظيف</h3>
        </a>




    </section>
@endsection
