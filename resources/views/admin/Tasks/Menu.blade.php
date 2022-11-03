@extends('admin.layout.index')
@section('content')
    <section class="boxs border">

        <a href="{{url('/admin/Task')}}" >
            <i class="fa-solid fa-list fa-2x"></i>
            <h3>  المهام الداخلية</h3>
        </a>

        <a href="{{url('/admin/TasksNotify')}}" >
            <i class="fa-solid fa-clipboard-check fa-2x"></i>
            <h3>التنبيهات</h3>
        </a>

        <a href="{{url('/admin/NotifySales')}}" >
            <i class="fa-solid fa-map fa-2x"></i>           
             <h3> مهام المبيعات</h3>
        </a>

   


    </section>
@endsection
