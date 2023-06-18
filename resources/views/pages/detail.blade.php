@extends('index')

@section('content')
    <div class="flex flex-col w-full">
        <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded w-fit cursor-pointer" href="{{ route($back) }}">
            Back
        </a>
        <h1 class="font-bold text-center text-3xl"> {{ $param['title'] }} </h1>
        <h1 class="font-bold text-center text-base pt-4"> {{ $param['content'] }} </h1>
        <div class="flex justify-between">
            <h1 class="font-bold text-end text-base pt-4 text-gray-500"> Created by : {{ $param->user->name }} </h1>
            <h1 class="font-bold text-end text-base pt-4 text-gray-500"> {{ $param['created_at']->diffForHumans() }} </h1>
        </div>
    </div>
@endsection
