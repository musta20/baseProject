@extends('admin.layout.index')
@section('content')
<a href="{{url('/admin/SalesType')}}" class="btn btn-Primary">  اضافة تصنيف</a>

    <section class="boxs border">

        @foreach ($tasks as $item)

        <a href="{{url('/admin/NotifySales/'. $item->id)}}" >

            <i class="fa-solid fa-list fa-2x"></i>
            
            <h3>{{$item->name}}</h3>
        </a>

        @endforeach
    </section>
@endsection
