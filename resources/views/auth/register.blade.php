@extends('layout.auth')

@section('content')
    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-2 rounded">
            {{ session()->get('success') }}
        </div>
    @endif
    <form method="POST" class="flex flex-col gap-4 justify-start w-full">
        @csrf
        <div class="flex flex-col" id="name">
            <label for="name" class="font-semibold">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="border border-gray-300 p-2 rounded"
                value="{{ old('name') }}">
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col" id="email">
            <label for="email" class="font-semibold">Email</label>
            <input type="email" name="email" id="email" class="border border-gray-300 p-2 rounded"
                value="{{ old('email') }}">
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col" id="password">
            <label for="password" class="font-semibold">Password</label>
            <input type="password" name="password" id="password" class="border border-gray-300 p-2 rounded"
                value="{{ old('password') }}">
            @error('password')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="bg-red-500 text-white p-2 rounded hover:bg-red-600 transition-all duration-300 ease-in-out">
            Submit
        </button>
    </form>
@endsection
