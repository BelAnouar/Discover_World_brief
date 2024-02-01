
@extends('layouts.app')

@section('content')
  {{$errors}}  
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      
        <div class="p-6 bg-white border-b border-gray-200">
            <form method="POST" action="{{route('adventure.store')}}" enctype="multipart/form-data">
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
                    <input type="file" class="border-2 border-gray-300 p-2 w-full" name="images[]" multiple id="description" >
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