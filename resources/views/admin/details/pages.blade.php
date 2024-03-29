@extends('layout.admin')

@section('content')
    <div class="mb-4 rounded-lg overflow-hidden p-1 cursor-default">
        <button
            class="bg-orange-500 text-white p-2 rounded hover:bg-orange-600 transition-all duration-300 ease-in-out relative shadow-lg shadow-red-200 my-4">
            <div class="shadow-custom">
                <a href="{{ route($title . '.create') }}">
                    Create {{ $title }}
                </a>
            </div>
        </button>
        <table class="table-auto w-full table-striped">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-2 bg-primary-800 hover:bg-primary-800/60 border-black">ID</th>
                    <th class="px-4 py-2 border-2 bg-primary-800 hover:bg-primary-800/60 border-black">Title</th>
                    <th class="px-4 py-2 border-2 bg-primary-800 hover:bg-primary-800/60 border-black">Image</th>
                    <th class="px-4 py-2 border-2 bg-primary-800 hover:bg-primary-800/60 border-black">Updated</th>
                    <th class="px-4 py-2 border-2 bg-primary-800 hover:bg-primary-800/60 border-black">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td class="border-2 px-4 py-2 border-black font-bold text-center">{{ $item->id }}</td>
                        <td class="border-2 px-4 py-2 border-black">{{ $item->title }}</td>
                        <td class="border-2 px-4 py-2 border-black">
                            @if ($item->image != null)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                    class="w-52" />
                            @else
                                <img src="https://via.placeholder.com/150"
                                    alt="{{ $item->title }}
                                    class="w-52" />
                            @endif
                        </td>
                        <td class="border-2 px-4 py-2 border-black w-52">
                            <div class="flex flex-col w-full gap-2">
                                <span>Updated: {{ $item->updated_at->diffForHumans() }}</span>
                            </div>
                        </td>
                        <td class="border-2 px-4 py-2 border-black">
                            <div class="flex gap-2">
                                <a href="{{ route($title . '.edit', $item->id) }}"
                                    class="py-2 px-4 text-center bg-blue-400 rounded-lg text-white font-bold">Edit</a>
                                <form method="POST" action="{{ route($title . '.destroy', $item->id) }}"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="py-2 px-4 text-center bg-red-400 rounded-lg text-white font-bold btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ $items->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
