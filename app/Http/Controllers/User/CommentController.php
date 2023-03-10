<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserCommentNotification;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'comment'=>'required',
            
        ]);



        Comment::create([
            'comment'=> $request->input('comment'),
            'user_id' => auth()->user()->id,
            'post_id' => $request->input('post_id'), 
        ]);

        $userId = auth()->user()->id;
        if($userId){
            $user = User::whereId($userId)->first();

            auth()->user()->notify( new UserCommentNotification($user));
        }

        return redirect()->back()
                ->with('message', 'Your blog post have been created');
   

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function markasread($id)
    {
        if($id){
            auth()->user()->notifications->where('id', $id)->markasread();
        }

        return back();
    }
}
