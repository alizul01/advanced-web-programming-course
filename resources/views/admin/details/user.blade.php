@extends('layout.admin')

@section('content')
    <div class="mb-4 rounded-lg overflow-hidden p-1 cursor-default">
        <table class="table-auto w-full table-striped">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-2 bg-primary-800 hover:bg-primary-800/60 border-black">ID</th>
                    <th class="px-4 py-2 border-2 bg-primary-800 hover:bg-primary-800/60 border-black">Title</th>
                    <th class="px-4 py-2 border-2 bg-primary-800 hover:bg-primary-800/60 border-black">Email</th>
                    <th class="px-4 py-2 border-2 bg-primary-800 hover:bg-primary-800/60 border-black">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $page)
                    <tr>
                        <td class="border-2 px-4 py-2 border-black font-bold text-center">{{ $page->id }}</td>
                        <td class="border-2 px-4 py-2 border-black">{{ $page->name }}</td>
                        <td class="border-2 px-4 py-2 border-black">{{ $page->email }}</td>
                        <td class="border-2 px-4 py-2 border-black">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.user.show', $page->id) }}"
                                    class="py-2 px-4 text-center bg-blue-400 rounded-lg text-white font-bold">Edit</a>
                                <form method="POST" action="{{ route('admin.user.delete', $page->id) }}" onsubmit="return confirm('u sure?')">
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
            {{ $user->links('pagination::tailwind') }}
        </div>
    </div>

    {{-- button to call UserController for controller function call --}}
    <div class="flex justify-center">
        <form action="{{ route('admin.user.pdf') }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Generate PDF
            </button>
        </form>
    </div>
@endsection
