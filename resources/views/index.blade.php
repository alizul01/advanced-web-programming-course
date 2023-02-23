@extends('layout.master')

@section('layout')
    <a href="{{ route('logout') }}"
        class="bg-primary w-fit absolute top-24 border-black border-2 rounded-xl p-3 hover:bg-amber-600 cursor-pointer">
        <div class="shadow-custom h-full flex items-center justify-center">
            Logout
        </div>
    </a>
    <span
        class="bg-primary w-fit absolute bottom-24 border-black border-2 rounded-xl p-3 hover:bg-amber-600 cursor-pointer">
        <div class="shadow-custom h-full flex items-center justify-center">
            Halo, {{ Auth::user()->name }}!
        </div>
    </span>
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
