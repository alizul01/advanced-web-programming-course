<div>
    <div
        class="rounded-lg overflow-hidden flex flex-col max-w-sm flex-grow-1 bg-white h-fit border-2 border-black justify-between">
        @if ($image === null)
            <img class="w-full object-cover max-h-40 min-h-40" src="{{ asset('assets/placeholder/placeholder.png') }}" alt="Mountain">
        @else
            <img class="w-full object-cover max-h-40 min-h-40" src="{{ asset('storage/' . $image) }}" alt="Mountain">
        @endif
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $title }}</div>
            <p class="text-gray-700 text-base line-clamp-3">
                {{ $content }}
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <a href="{{ route($route . '.show', $slug) }}" class="w-64 bg-red-500 px-4 py-2 rounded-lg text-white font-bold hover:bg-red-700">
                Detail
            </a>
        </div>
        {{-- <div class="px-6 pt-4 pb-2">
            @foreach (json_decode($tags) as $tag)
                <span
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    {{ $tag }}
                </span>
            @endforeach
        </div> --}}
    </div>
</div>
