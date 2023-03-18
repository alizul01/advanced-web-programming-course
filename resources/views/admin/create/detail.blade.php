@extends('layout.admin')
@section('content')
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" class="flex flex-col gap-6 justify-start" action={{ route($title . '.store') }} enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col" id="title">
            <label for="title" class="font-semibold">title</label>
            <input type="text" name="title" id="title"
                class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white" value="{{ old('title') }}">
            @error('title')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col" id="content">
            <label for="content" class="font-semibold">Content</label>
            <textarea type="text" name="content" id="content"
                class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white h-72"></textarea>
            @error('content')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col" id="image">
            <label for="image" class="font-semibold">image</label>
            <input type="file" name="image" id="image"
                class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white" value="">
            @error('image')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="bg-orange-500 text-white p-2 rounded hover:bg-orange-600 transition-all duration-300 ease-in-out relative shadow-lg shadow-red-200">
            <div class="shadow-custom">
                Create
            </div>
        </button>
    </form>
@endsection
