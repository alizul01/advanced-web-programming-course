@extends('layout.admin')

@section('content')
    <div class="flex items-center justify-center flex-row w-full">
        <div class="flex flex-col flex-wrap gap-4 justify-center items-center w-full p-2">
            <p class="text-start font-semibold shadow-custom">
                Hey hoo {{ Auth::user()->name }}! Welcome to your dashboard.
                <span class="text-green-700">
                    Here you can see your data.
                </span>
            </p>
            <div class="flex flex-row gap-4 flex-wrap w-full items-center justify-center">
                @foreach ($data as $key => $value)
                    <div
                        class="bg-primary-800 text-black text-start rounded-lg w-12 p-2 flex flex-col justify-between min-w-[16rem] border-2 border-black gap-2">
                        <div class="w-full">
                            <span class="text-xl font-bold">
                                <span class="text-gray-800 flex flex-row gap-1">
                                    {{ $value }}
                                    <p>
                                        @if ($value <= 0)
                                            (Zero)
                                        @elseif($value >= 5 && $value <= 10)
                                            (Few)
                                        @else
                                            (Many)
                                        @endif
                                    </p>
                                </span>
                            </span>
                        </div>
                        <div class="w-full">
                            {{ ucfirst($key) }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
