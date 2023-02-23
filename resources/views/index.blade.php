@extends('layout.master')

@section('layout')
    <nav class="flex flex-row items-center justify-between">
        @include('components.navbar')
    </nav>
    <main class="bg-primary w-full relative border-black border-2 rounded-xl p-4">
        <div class="shadow-custom h-full flex items-center justify-center">
            @yield('content')
        </div>
    </main>
    <footer>
        @include('components.footer')
    </footer>
@endsection
