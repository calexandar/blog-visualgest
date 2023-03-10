@extends('layouts.main')

@section('content')
    @foreach (auth()->user()->unreadnotifications  as $notification)
        <div class="w-4/5 mx-auto text-left bg-blue-300 p-3 m-2">
            <b>{{ $notification->data['name'] }}</b><span>  commented on your post !!!</span>
            <a href="{{ route('markasread', $notification->id) }}" class="p-2 bg-red-400 text-white rounded-lg"> Mark as read</a>
        </div>
    @endforeach

    <div class="w-4/5 mx-auto text-left mt-14">
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


