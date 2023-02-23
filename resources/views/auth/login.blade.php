@extends('layout.auth')

@section('content')
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" class="flex flex-col gap-6 justify-start w-96">
        @csrf
        <div class="flex flex-col" id="email">
            <label for="email" class="font-semibold">Email</label>
            <input type="email" name="email" id="email"
                class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white" value="">
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col" id="password">
            <label for="password" class="font-semibold">Password</label>
            <input type="password" name="password" id="password"
                class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white" value="{{ old('password') }}">
            @error('password')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="bg-red-500 text-white p-2 rounded hover:bg-red-600 transition-all duration-300 ease-in-out relative shadow-lg shadow-red-200">
            <div class="shadow-custom">
                Login
            </div>
        </button>
        <span class="text-center">Don't have account yet? <a href="{{ route('register') }}"
                class="text-red-500 hover:text-red-600">Register</a>
        </span>
    </form>
@endsection
