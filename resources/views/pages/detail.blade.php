@extends('index')

@section('content')
    <div class="flex flex-col w-full">
        <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded w-fit cursor-pointer" href="{{ route($back) }}">
            Back
        </a>
        <h1 class="font-bold text-center"> {{ $param['title'] }} </h1>
    </div>
@endsection
