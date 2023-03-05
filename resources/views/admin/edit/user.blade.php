@extends('layout.admin')
@section('content')
@if (session('success'))
    <div class="bg-green-500 text-white p-2 rounded-lg mb-4">
        {{ session('success') }}
    </div>
@endif
<form method="POST" class="flex flex-col gap-6 justify-start">
    @csrf
    @method('PUT')
    <div class="flex flex-col" id="id">
        <label for="id" class="font-semibold">ID</label>
        <input type="text" class="border-2 border-black p-2 rounded-lg focus:outline-none bg-gray-200 cursor-not-allowed" readonly
            value="{{ $user->id }}">
    </div>
    <div class="flex flex-col" id="name">
        <label for="name" class="font-semibold">Name</label>
        <input type="text" name="name" id="name"
            class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white" value="{{ $user->name }}">
        @error('name')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex flex-col" id="email">
        <label for="email" class="font-semibold">Email</label>
        <input type="email" name="email" id="email"
            class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white" value="{{ $user->email }}">
        @error('email')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex flex-col" id="photo">
        <label for="photo" class="font-semibold">Photo</label>
        <input type="file" name="photo" id="photo"
            class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white" value="">
        @error('photo')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit"
        class="bg-orange-500 text-white p-2 rounded hover:bg-orange-600 transition-all duration-300 ease-in-out relative shadow-lg shadow-red-200">
        <div class="shadow-custom">
            Update
        </div>
    </button>
</form>
@endsection
