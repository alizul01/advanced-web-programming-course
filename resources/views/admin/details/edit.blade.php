@if (session('success'))
    <div class="bg-green-500 text-white p-2 rounded-lg mb-4">
        {{ session('success') }}
    </div>
@endif
<form method="POST" class="flex flex-col gap-6 justify-start">
    @csrf
    <div class="flex flex-col" id="title">
        <label for="title" class="font-semibold">Title</label>
        <input type="text" name="title" id="title"
            class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white" value="">
        @error('title')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex flex-col" id="content">
        <label for="content" class="font-semibold">Content</label>
        <input type="text" name="content" id="content"
            class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white" value="">
        @error('content')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex flex-col" id="image">
        <label for="image" class="font-semibold">Image</label>
        <input type="file" name="image" id="image"
            class="border-2 border-black p-2 rounded-lg focus:outline-none bg-white" value="">
        @error('image')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit"
        class="bg-red-500 text-white p-2 rounded hover:bg-red-600 transition-all duration-300 ease-in-out relative shadow-lg shadow-red-200">
        <div class="shadow-custom">
            Create
        </div>
    </button>
</form>
