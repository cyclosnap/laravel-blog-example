<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {

        //check if user exists
        $user = User::findOrFail($user_id);

        $posts = Post::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('users.show', [
            'posts' => $posts,
            'user' => $user,
        ]);

    }
}
