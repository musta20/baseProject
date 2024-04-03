<!DOCTYPE html>
<html   lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ in_array(app()->getLocale(), ['ar']) ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @vite(['resources/assets/css/style.css', 'resources/assets/js/app.js'])

    <title>AdminCSS</title>
</head>

<body class="bg-gray-100 flex w-full font-IBMPlex">

    <x-admin.side-menu />
    <main class="w-full">
        <x-card-message />

   <x-admin.nav />

        {{ $slot }}





    </main>
    <x-model-box></x-model-box>

</body>

</html>