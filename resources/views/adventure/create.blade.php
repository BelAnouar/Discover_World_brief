
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
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        
      
        <div class="p-6 bg-white border-b border-gray-200">
            <form method="POST" action="{{route('adventure.store')}}" 	enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="" >
                </div>

                <div class="mb-4">
                    <label class="text-xl text-gray-600">Description</label></br>
                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="description" id="description" placeholder="(Optional)">
                </div>
                <div class="mb-4">
                    <label class="text-xl text-gray-600">Continent</label></br>
                    <select class="w-full border-2 border-gray-300 border-r p-2" name="destination_id">
                     
                        @foreach($continents as $continent)

                        <option class="text-black" value="{{$continent->id}}">{{$continent->continent}}</option>
                       @endforeach
                    </select>
                </div>
 
                <div class="mb-8">
                    <label class="text-xl text-gray-600">Consiel <span class="text-red-500">*</span></label></br>
                    <textarea name="consiel" class="border-2 border-gray-500">

                    </textarea>
                </div>
                <div class="mb-8">
                    <label class="text-xl text-gray-600 mb-2">choose images</label></br>
                    <input type="file" class="border-2 border-gray-300 p-2 w-full" name="image[]" multiple id="description" >
                </div>

                <div class="flex p-1">
                    <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" >Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

        <script>
            CKEDITOR.replace( 'consiel' );
        </script>
@endsection


