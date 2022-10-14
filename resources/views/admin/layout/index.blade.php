<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('icons/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Dahboard</title>

</head>
<body>
        @include('admin.layout.header')
    <section class="mainBody">

        @include('admin.layout.menu')
        <main>@yield('content')</main>

    </section>
  
   
</body>
</html>