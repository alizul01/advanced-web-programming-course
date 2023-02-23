@extends('index')

@section('content')
    <div class="flex flex-col gap-6 w-full justify-start items-start">
        <div class="flex flex-row items-center justify-center gap-8">
            <div class="relative w-full">
                <img src="https://images.unsplash.com/photo-1570126618953-d437176e8c79?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=794&q=80"
                    alt="companyimg" class="w-full rounded-lg shadow-lg hover:shadow-2xl hover:shadow-red-300 hover:scale-105 transition-all duration-300 ease-in-out h-80 overflow-hidden object-cover">
            </div>
            <div class="flex flex-col gap-4">
                <h1 class="font-bold text-3xl">
                    Creagency Company
                </h1>
                <p class="text-base">
                    Creagency Company is a company that provides services in the field of web development and web design. We are a company that has been established since 2019 and has been trusted by many people.
                </p>
                <button class="shadow-lg bg-red-600 text-white font-bold py-2 px-4 rounded-lg w-fit">
                    Read More
                </button>
            </div>
        </div>
    </div>
@endsection
