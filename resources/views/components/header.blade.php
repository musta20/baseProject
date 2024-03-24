<!DOCTYPE html>
<html lang="en" dir="rtl">

<div id="mySidenav" class="sidenav ">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <a href="/">الرئيسية</a>
    <a href="{{route('CheckStatus')}}">الإستعلام</a>
    <a href="{{route('category')}}">الخدمات</a>
    <a href="{{route('contact')}}">تواصل معنا</a>
    <a href="{{route('jobs')}}">الوظائف</a>
</div>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{  $setting->title }} </title>
    <meta name="description" content="{{  $setting->des }}">
    <meta name="keywords" content="{{  $setting->keyword }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tiny-Swiper JS -->

    <link rel="stylesheet" href="{{asset('sadana/style/style.css')}}" />
    <link rel="stylesheet" href="{{asset('sadana/style/Server.css')}}" />
    <link rel="stylesheet" href="{{asset('sadana/style/reponsev.css')}}" />
    <link rel="stylesheet" href="{{asset('sadana/style/all.min.css')}}" />

    <title>سدنه</title>
    <header>

        <div style="display:none;" class="min-h">
            <a href="#">
                <i class="fa-solid fa-headset"></i>
                الدعم الفني </a>
            <div class="login">
                <a href="#">دخول <i class="fa-solid fa-right-to-bracket"></i></a>
                <a href="#">التسجيل <i class="fa-solid fa-user-plus"></i></a>
            </div>
        </div>
        <div class="main-h">
            <div style="display:none;"><i class="fa-solid fa-2x fa-cart-shopping"></i></div>

            <div class="navButton">
                <a href="javascript:void(0)" onclick="openNav()" class="fa fa-bars fa-2x a-btn"></a>



            </div>
            <img class="logoImge" width="70" src="{{asset('imgs/v.svg')}}" />
            <div id="menu" class="nav">


                <a href="/">الرئيسية</a>
                <a href="{{route('CheckStatus')}}">الإستعلام</a>
                <a href="{{route('category')}}">الخدمات</a>
                <a href="{{route('contact')}}">تواصل معنا</a>
                <a href="{{route('jobs')}}">التوظيف</a>
            </div>
            <div></div>
        </div>
    </header>
</head>



<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
