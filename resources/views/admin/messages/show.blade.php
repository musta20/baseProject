
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
    <x-card-message></x-card-message>
    <a href="{{url('/admin/Messages/create')}}" class="btn btn-Primary"> ارسال رسالة</a>

</div>
<table>
<tr>
    <td>من</td>
    <td>{{$message->fromm->name}}</td>
</tr>
<tr>
    <td>الى</td>
    <td>{{$message->too->name}}</td>
</tr>

<tr>
    <td>العنوان</td>
    <td>{{$message->title}}</td>
</tr>

<tr>
    <td>من</td>
    <td>{{$message->message}}</td>
</tr>

<tr>
    <td></td>
    <td></td>
</tr>

</table>
 
    


</section>
    
@endsection