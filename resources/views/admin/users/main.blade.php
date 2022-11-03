@extends('admin.layout.index')
@section('content')
    <section class="boxs border">

        <a href="{{url('/admin/perm')}}" >
            <i class="fa-solid fa-list fa-2x"></i>
            <h3> ادارة الصلاحيات</h3>
        </a>

        <a href="{{url('/admin/UsersList')}}" >
            <i class="fa-solid fa-clipboard-check fa-2x"></i>
            <h3>عرض جميع الموظفين</h3>
        </a>

        <a href="{{url('/admin/Users/create')}}" >
            <i class="fa-solid fa-map fa-2x"></i>           
             <h3> اضافة موظف جديد</h3>
        </a>

   


    </section>
@endsection
