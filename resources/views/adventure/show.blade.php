@extends('layouts.app')

@section('content')

    <header class="bg-gray-100">
        <div class="xl:container xl:mx-auto flex flex-col items-center sm:flex-row sm:justify-between text-center py-4">
            <div class="md:flex-none w-96 order-2 sm:order-1 flex justify-center py-4 sm:py-0">
                <input type="text"
                    class="mt-1 block w-60 px-3 py-2 bg-white broder broder-state-300 rounded-full text-sm shadow-sm placeholder-state-500 input-text"
                    placeholder="Search.." />
            </div>
            <div class="shrink  sm:order-2 px-3">
                <img src="{{ asset('images/logoDW.png') }}" class="w-52" alt="logo">
            </div>
            <div class="w-96 order-3 flex justify-center">
                <div class="flex gap-6">
                    @if (Route::has('login'))
                        <div class=" sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                <a href="{{ url('/home') }}"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                    in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
    
    <section>
        <div class=" w-3/5 mx-auto flex flex-col gap-4 shadow-2xl rounded-xl border my-20">



            <div class="images carousel ">
                @foreach ($adventure->images as $image)
                    <img src="{{ $image->image_path }}" alt="Wiki Image" class="carousel-item w-full h-96 rounded-t-xl">
                @endforeach
            </div>

            <div class="flex flex-col w-full gap-4  mt-4 pl-4">
                <h1 class="text-3xl font-medium">{{ $adventure->title }}</h1>


                <p class="text-lg   text-gray-600">{{ $adventure->description }}</p>

            </div>


            <div class="w-full   rounded-b-xl ">
                <p class="pl-8 py-2 font-medium text-md text-gray-400">
                    Author : {{ $adventure->user->name }}
                </p>
            </div>


        </div>
    </section>
@endsection
