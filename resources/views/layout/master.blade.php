<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muhammad Ali Zulfikar</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{asset('assets/img/graphic-designer.png')}}" type="image/x-icon">
</head>

<body class="bg-[#F0EEED]  w-full flex justify-center items-center py-24">
    @include('sweetalert::alert')
    <div class="max-w-4xl flex justify-center items-center flex-col gap-10">
        @yield('layout')
    </div>
</body>

</html>
