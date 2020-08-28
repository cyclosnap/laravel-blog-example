<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Default not-logged in route:
     */
    public function welcome()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);
        return view('welcome', ['posts' => $posts]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::findOrFail((int) auth()->user()->id);

        $posts = Post::where('user_id',$user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('users.show', [
            'posts' => $posts,
            'user' => $user,
        ]);
    }
}
