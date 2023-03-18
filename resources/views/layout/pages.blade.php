@extends('index')

@section('content')

    <div class="flex flex-col items-center gap-2 w-full">
        <h1 class="font-bold text-2xl capitalize pb-8">
            {{$title}}
        </h1>
        <ul class="flex flex-row gap-4 w-full justify-around items-start flex-wrap">
            @foreach ($items as $item)
                <x-card :title="$item['title']" :content="$item['content']" :image="$item['image']" :tags="$item['tags']" :slug="$item['slug']" :route="$title" />
            @endforeach
        </ul>
    </div>
@endsection
