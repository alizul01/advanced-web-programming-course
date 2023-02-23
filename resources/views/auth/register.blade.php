@extends('layout.auth')

@section('content')
    <form method="POST" class="flex flex-col gap-6 justify-start w-96">
        @csrf
        <div class="flex flex-col" id="name">
            <label for="name" class="font-semibold">Nama Lengkap</label>
            <input type="text" name="name" id="name"
                class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white" value="">
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
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
                Register
            </div>
        </button>
        <span class="text-center">Already have account? <a href="{{ route('login') }}"
                class="text-red-500 hover:text-red-600">Login</a>
        </span>
    </form>
@endsection
