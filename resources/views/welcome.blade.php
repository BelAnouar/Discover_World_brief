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
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logoDW.png') }}" class="w-52" alt="logo">
                </a>
            </div>
            <div class="w-96 order-3 flex justify-center">
                <div class="flex gap-6">
                    @if (Route::has('login'))
                        <div class=" sm:top-0 sm:right-0 p-6 text-right z-10">
                            <a href="{{ route('adventure.index') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white px-4 ">Adventure</a>
                            @auth
                                <a href="{{ url('/') }}"
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

    <section class="py-16">
        <div class="container mx-auto md-px-20">
            <h1 class="font-bold text-4xl pb-12 text-center">Adventure</h1>
            <div class="w-full carousel ">
                <div class="carousel-item w-full">
                    <div class="grid md:grid-cols-2 gap-2 ">
                        <div class="image ">
                            <img src="/images/adv.jpg" class="h-full " alt="post" />

                        </div>
                        <div class="info flex justify-center flex-col">
                            <div class="cat">
                                <a href="/" class="text-green-600 hover:text-green-800">
                                    Adventure Travel
                                </a>
                                <a href="/" class="text-gray-600 hover:text-gray-800">
                                    July 3-20
                                </a>
                            </div>
                            <div class="title">
                                <a href="/" class="text-3xl md:text-6xl font-bold text-gray-800 hover:text-gray-600 ">
                                    Embrace the Unknown: A Journey into Adventure
                                </a>
                            </div>
                            <p class="text-gray-500 py-3">
                                Embark on a thrilling adventure, where the path unfolds with every step. The
                                unpredictable twists and turns
                                create stories that resonate for a lifetime. Unlike the all-powerful Pointing, adventure
                                knows no bounds,
                                leading us to extraordinary places and unforgettable experiences.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item w-full">
                    <div class="grid md:grid-cols-2 ">
                        <div class="image px-2">
                            <img src="/images/adv.jpg" class="h-full " alt="post" />

                        </div>
                        <div class="info flex justify-center flex-col  ">
                            <div class="cat">
                                <a href="/" class="text-orange-600 hover:text-orange-800">
                                    Business Travel
                                </a>
                                <a href="/" class="text-gray-600 hover:text-gray-800">
                                    July 3-20
                                </a>
                            </div>
                            <div class="title">
                                <a href="/" class="text-3xl md:text-6xl font-bold text-gray-800 hover:text-gray-600 ">
                                    Your most unhappy customers are your greatest source of learning
                                </a>

                            </div>
                            <p class="text-gray-500 py-3">
                                Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic life One day however a small line of blind
                                text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
                            </p>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    
    <section class="mx-auto py-16  sm:max-w-xl md:max-w-full lg:max-w-screen-xl   ">
        <div class="grid grid-cols-2 row-gap-8 md:grid-cols-4">
            
            <div class="text-center md:border-r">

                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{ $countAdventure }}</h6>
                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                    Adventures
                </p>
            </div>
            <div class="text-center md:border-r">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{ $countUser }}</h6>
                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                    Users
                </p>
            </div>
            <div class="text-center md:border-r">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{ $countDestination }}</h6>
                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                    Destinations
                </p>
            </div>
            <div class="text-center ">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">144K</h6>
                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                    Downloads
                </p>
            </div>

        </div>
    </section>

<section class="py-16">
        <h2 class="font-bold text-4xl pb-12 text-center">destination</h2>
        <div class=" grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($distinations as $distination)
                <a href="#"
                    class=" max-w-sm mx-auto sm:max-w-60 rounded-lg group hover:no-underline focus:no-underline flex flex-col dark:bg-slate-900">
                    <div class="lg:col-span-4 mb-3">
                        <img src="{{ $distination->image }}" alt="Description de l'image" class="w-full h-auto rounded-md">
                    </div>
                    <div class="lg:col-span-8 text-center">
                        <h2 class="text-xl font-bold mb-2 text-white">{{ $distination->continent }}</h2>
                    
                    </div>
                </a>
            @endforeach
        <div class="mx-auto flex justify-between">
            {!! $distinations->links() !!}</div>
        </div>
    </section>


    <section class="container mx-auto py-10">
        <h1 class="font-bold text-4xl text-center py-4">Lastest Posts</h1>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($adventures as $adventure)
                <div class="item">
                    <div x-data="{ currentSlide: 0, totalSlides: {{ count($adventure->images) }} }">
                        <div class="images carousel ">
                            @foreach ($adventure->images as $image)
                                <div class="carousel-item w-full active">
                                    <img src="{{ $image->image_path }}" class="rounded" alt="post" />
                                </div>
                            @endforeach
                        </div>


                    </div>

                    <div class="info flex justify-content flex-col py-4">
                        <div class="flex gap-2">
                            <p href="/" class="text-orange-600 hover:text-orange-800">
                                Travel
                            </p>
                            <p href="/" class="text-gray-600 hover:text-gray-800">
                                {{ $adventure->created_at->format('F j, Y') }}
                            </p>
                        </div>
                        <div class="title">
                            <a href="/" class="text-xl font-bold text-gray-800 hover:text-gray-600 ">
                                {{ $adventure->title }}
                            </a>

                        </div>
                        <p class="text-gray-500 ">
                        <p>{{ Str::limit($adventure->description, 100) }}
                            <a href="{{ route('adventure.show', $adventure) }}"class="text-blue-600">Read more </a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


@endsection
