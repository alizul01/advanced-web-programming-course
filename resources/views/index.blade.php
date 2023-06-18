@extends('layout.master')

@section('layout')
    <a href="{{ route('logout') }}" data-cy="logout"
        class="bg-primary-900 w-fit relative top-0 border-black border-2 rounded-xl p-3 hover:bg-amber-600 cursor-pointer">
        <div class="shadow-custom h-full flex items-center justify-center">
            Logout
        </div>
    </a>
    <nav class="flex flex-row items-center justify-between">
        @include('components.navbar')
    </nav>
    <main class="bg-primary-900 w-full relative border-black border-2 rounded-xl p-4">
        <div class="shadow-custom h-full flex items-center justify-center flex-row">
            @yield('content')
        </div>
    </main>

    <span class="bg-primary-900 w-fit relative bottom-0 border-black border-2 rounded-xl p-3 hover:bg-amber-600 cursor-pointer">
        <div class="shadow-custom h-full flex items-center justify-center">
            Halo, {{ Auth::user()->name }}! email saya {{ Auth::user()->email  }}
        </div>
    </span>
    <footer>
        @include('components.footer')
    </footer>

    
@endsection
