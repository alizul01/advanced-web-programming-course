@extends('layout.admin')
@section('content')
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" class="flex flex-col gap-6 justify-start" action={{ route($title . '.update', $item->id) }}>
        @csrf
        @method('PUT')
        <div class="flex flex-col" id="id">
            <label for="id" class="font-semibold">ID</label>
            <input type="text"
                class="border-2 border-black p-2 rounded-lg focus:outline-none bg-gray-200 cursor-not-allowed" readonly
                value="{{ $item->id }}">
        </div>
        <div class="flex flex-col" id="title">
            <label for="title" class="font-semibold">title</label>
            <input type="text" name="title" id="title"
                class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white" value="{{ $item->title }}">
            @error('title')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col" id="content">
            <label for="content" class="font-semibold">Content</label>
            <textarea type="text" name="content" id="content"
                class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white h-72">{{ $item->content }}</textarea>
            @error('content')
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
