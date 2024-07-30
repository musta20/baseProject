<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $setting->title ?? 'الرئيسية' }} </title>
    <meta name="description" content="{{ $setting->des }}">
    <meta name="keywords" content="{{ $setting->keyword }}">
        @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>

<body class=" bg-slate-200 font-Noto">

    <x-header />
<x-card-message />
    <main>
        {{ $slot }}

    </main>
    <x-footer />
</body>

</html>