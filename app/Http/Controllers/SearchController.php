<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchQuery()
    {
        $posts = Post::search(request('search'))->paginate();

        return view('search.index', compact('posts'));
    }
}
