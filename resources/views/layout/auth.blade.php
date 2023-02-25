@extends('layout.master')

@section('layout')
    <main class="bg-primary-900 w-full relative border-black border-2 rounded-xl p-4">
        <div class="shadow-custom h-full flex items-center justify-center flex-col gap-4">
            @yield('content')
        </div>
    </main>
@endsection
