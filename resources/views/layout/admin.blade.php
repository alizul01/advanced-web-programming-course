<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muhammad Ali Zulfikar</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('assets/img/graphic-designer.png') }}" type="image/x-icon">
</head>

<body class="bg-[#F0EEED]  w-full flex justify-center items-center py-24 min-h-screen flex-col gap-4">
    <span
        class="bg-primary w-fit relative bottom-0 border-black border-2 rounded-xl p-3">
        <div class="shadow-custom h-full flex items-center justify-center">
            Halo, Admin!
        </div>
    </span>
    <div class="flex justify-center items-center flex-row gap-10">
        <aside class="w-64">
            @include('admin.partials.sidebar')
        </aside>
        <main class="bg-primary w-full relative border-black border-2 rounded-xl p-4">
            <div class="shadow-custom h-full flex items-center justify-center flex-row">
                @include('admin.form')
            </div>
        </main>
    </div>
    <footer>
        @include('components.footer')
    </footer>
</body>

</html>
