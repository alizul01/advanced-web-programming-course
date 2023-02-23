@extends('index')

@section('content')
    <div class="flex flex-col items-center gap-2 w-full">
        <h1 class="font-bold">
            Product
        </h1>
        <ul class="flex flex-col gap-2 w-full justify-start items-start">
            @foreach($news as $item)
            <li>
                <a href="news/{{$item['slug']}}">
                    {{ $item['title'] }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
