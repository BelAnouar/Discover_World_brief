
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
<div class="container mx-auto mt-10 mb-10 max-w-4xl">
  <h1 class="mb-10 text-2xl">Adventure </h1>
  <p x-text="ldl"></p>

  <form method="GET" action="{{ route('adventure.index') }}" class="mb-4 flex items-center space-x-2">
    <input type="text" name="continant" placeholder="Search by destination"
      value="{{ request('title') }}" class="input h-10" />
    <input type="hidden" name="filter" value="{{ request('filter') }}" />
    <button type="submit" class="btn h-10">Search</button>
    <a href="{{ route('adventure.index') }}" class="btn h-10">Clear</a>
  </form>
  <ul class="grid md:grid-cols-2 lg:grid-cols-3 gap-4" x-data="{ currentSlide: 0, totalSlides: {{ $adventures->count() }}, autoplay: true }">
    @forelse ($adventures as $adventure)
    <li >
       
        <div class="item">
            <div x-data="{ currentSlide: 0, totalSlides: {{ count($adventure->images) }} }">
                <div class="images carousel " >
                    @foreach ($adventure->images as $image)
                        <div class="carousel-item w-full active" >
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
                        {{$adventure->created_at->format('F j, Y')}}
                    </p>
                </div>
                <div class="title">
                    <a href="/" class="text-xl font-bold text-gray-800 hover:text-gray-600 ">
                        {{$adventure->title}}
                    </a>

                </div>
                <p class="text-gray-500 ">
                    <p>{{ Str::limit($adventure->description, 100) }}  
                    <a href="{{ route('adventure.show', $adventure) }}"class="text-blue-600">Read more </a>
                    </p>
            </div>
        </div>

        
       
    </li>
    @empty
    <li class="mb-4">
        <div class="empty-book-item">
          <p class="empty-text">No books found</p>
          <a href="{{ route('adventure.index') }}" class="reset-link">Reset criteria</a>
        </div>
      </li>
    @endforelse
  </ul>
  <div>{{ $adventures->links() }}</div>
</div>
@endsection


