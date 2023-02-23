@extends('index')

@section('content')
    @if (session()->has('success'))
        <div class="flex flex-col w-full gap-4 p-2">
            <div id="back">
                <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="text-red-500 rounded font-semibold">
                    Back
                </a>
            </div>
            <div class="font-bold text-green-500">
                {{ session()->get('success') }}
            </div>
        </div>
    @else
        <form method="POST" class="flex flex-col gap-4 justify-start w-full">
            @csrf
            <div class="flex flex-col" id="name">
                <label for="name" class="font-semibold">Name</label>
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
            <div class="flex flex-col" id="messages">
                <label for="messages" class="font-semibold">Messages</label>
                <input type="text" name="messages" id="messages" class="border border-gray-300 p-2 rounded"
                    value="{{ old('messages') }}">
                @error('messages')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-red-500 text-white p-2 rounded hover:bg-red-600 transition-all duration-300 ease-in-out">
                Submit
            </button>
        </form>
    @endif
@endsection
