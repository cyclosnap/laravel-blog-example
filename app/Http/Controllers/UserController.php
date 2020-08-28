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
        $user = User::findOrFail((int) $user_id);
        $posts = Post::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('users.show', [
            'posts' => $posts,
            'user' => $user,
        ]);
    }
}
