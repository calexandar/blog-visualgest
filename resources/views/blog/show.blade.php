@extends('layouts.main')

@section('content')
    <div class="w-4/5 mx-auto text-left">
        <div>
            <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" >
        </div>
        <div class="py-12">
            <h1 class="text-6xl">
                {{ $post->title }}
            </h1>
        </div>
    </div>

    <div class="w-4/5 mx-auto pt-20">
        <span class="text-gray-500">
            By <span class="font-bold italic text-gray-800">
                {{ $post->user->name }}
            </span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>

        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{ $post->content }}
        </p>
    </div>
    @include('blog.comment', ['comments'=>$post->comments])
@endsection


