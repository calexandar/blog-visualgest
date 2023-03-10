@extends('layouts.main')

@section('content')
    


        <div class="background-image grid grid-cols-1 m-auto">
            <div class="flex text-gray-100 pt-10">
                <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                    <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                        Welcome to my blog
                    </h1>
                    <a 
                        href="/blog" 
                        class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                        Read More
                    </a>
                </div>
            </div>
        </div>

        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200 my-9">
            <div>
                <img src="https://images.unsplash.com/photo-1584283598336-3162a018c0b4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
            </div>
            <div class="m-auto sm:m-auto text-left w-4/5 block">
                <h2 class="text-4xl font-extrabold text-gray-600">
                    Struggle to be better dev
                </h2>
            

                <p class="font-extrabold text-gray-600 text-l pb-9">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero, non!
                </p>

                <a 
                    href="/blog"
                    class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                    Find Out More
                </a>
            </div>
        </div>
        <div class="text-center py-12 bg-black text-white">
            <span class="font-extrabold block text-4xl py-1">
                Lorem, ipsum.
            </span>
            <span class="font-extrabold block text-4xl py-1">
                Lorem, ipsum.
            </span>
            <span class="font-extrabold block text-4xl py-1">
                Lorem, ipsum.
            </span>
            <span class="font-extrabold block text-4xl py-1">
                Lorem, ipsum.
            </span>
        </div>

        <div class="text-center py-14">
            <span class="uppercase text-sm text-gray-400">
                Blog
            </span>
            <h2 class="text-4xl font-bold py-10">
                Recent Post
            </h2>

            <p class="m-auto w-4/5 text-gray-500">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                Voluptatibus beatae consectetur quam neque eveniet consequatur id magni necessitatibus ipsam sint?
            </p>
        </div>

        <div class="sm:grid grid-cols-2 w-4/5 m-auto">
            <div class="flex bg-yellow-700 text-gray-100 pt-10">
                <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                    <span class="uppercase text-xs">
                        PHP
                    </span>

                    <h3 class="text-xl font-bold py-10">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, perspiciatis.
                    </h3>

                    <a 
                        href="#"
                        class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                        Find Out More
                    </a>
                </div>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
            </div>
        </div>
@endsection
    
    
        
