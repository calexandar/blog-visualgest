@extends('layouts.main')

@section('content')
  @if (session()->has('message'))
  <div class="w-4/5 m-auto mt-10 pl-2">
      <p class="w-2/6 mb-4 text-white bg-green-500 rounded-2xl py-4">
          {{ session()->get('message') }}
      </p>
  </div>
  @endif

  <div class="w-4/5 m-auto text-center">
    <div class="py-16 border-b border-gray-200">
      <h1 class="text-6xl">
        Search Posts
      </h1>
    </div>
  </div>

  <div class="pt-16 w-4/5 m-auto">
    <form action="/search" method="GET">
      @csrf
      <input 
        type="text"
        name="search"
        placeholder="Search..."
        class="pl-4 pr10 py3 loading-none rounded-lg shadow-sm 
              focusoutline-none focus:shadow-outline text-gray-600 font-medium">

      <button 
        type="submit" 
        class="bg-green-500 uppercase text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
        Search
      </button>        
    </form>
  </div>

@if (Auth::check())
<div class="pt-16 w-4/5 m-auto">
  <a 
      href="/blog/create"
      class="bg-blue-500 uppercase  text-gray-100 text-sm font-extrabold py-3 px-5 rounded-3xl">
  Create Post
  </a>
</div>
@endif
      


@foreach ($posts as $post)
  <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-16 border-b border-gray-200">
    <div>
      <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" >
    </div>
    <div>
      <h2 class="text-gray-700 font-bold text-5xl pb-4">
        {{ $post->title }}
      </h2>
      <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800"> Code with {{ $post->user->name }}</span>
      </span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}

      <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->content }}
      </p>

      <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
        Keep Reading
      </a>

      @if (isset(Auth::user()->id) && Auth::user()->id == $post->user->id)
          <span class="float-right">
            <a href="/blog/{{ $post->slug }}/edit" class="text-gray-700  italic pb-1 hover:text-gray-900">
            Edit Post
            </a>
          </span>

          <span class="float-right">
            <form 
              action="/blog/{{ $post->slug }}"
              method="POST">
              @csrf
              @method('delete')

              <button type="submit" class="text-red-500 pr-3">
                Delete Post
              </button>
            </form>
          </span>

      @endif
    </div>
  </div>
@endforeach
<div class="w-4/5 mx-auto">
  {{ $posts->links() }}
</div>
    

@endsection
