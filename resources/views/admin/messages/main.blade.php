@extends('admin.layout.index')
@section('content')
    <section class="boxs border">

        <a href="{{route('admin.Messages.create')}}" >
            <i class="fa-solid fa-list fa-2x"></i>
            <h3>إنشاء رسالة </h3>
        </a>

        <a href="{{url('/admin/inbox/1')}}" >
            <i class="fa-solid fa-clipboard-check fa-2x"></i>
            <h3> الرسال المرسلة </h3>
        </a>

        <a href="{{url('/admin/inbox/2')}}" >
            <i class="fas fa-truck fa-2x"></i>
            <h3> صندوق الوارد</h3>
        </a>

    










    </section>
@endsection
