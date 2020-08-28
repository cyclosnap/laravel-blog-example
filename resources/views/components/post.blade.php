<?php
$paragraphs = explode("\n", $post->body);
?>

<div class="card my-3">
    <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <h6 class="card-subtitle mb-2">By 
            <a href="{{route('user', ['id' => $post->user_id])}}">
                {{$post->user->name}}
            </a>
        </h6>
        <h6 class="card-subtitle mb-2 text-muted">Posted {{$post->created_at->diffForHumans()}}</h6>
        <p class="card-text">
            @foreach ($paragraphs as $paragraph)
                <p>{{$paragraph}}</p>
            @endforeach
        </p>
        <a href="{{route('posts.show', ['post' => $post->id])}}" class="btn btn-light">
            View Post
        </a>
        @can('update', $post)
            <a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-secondary">
                Edit Post
            </a>
            <form style="display: inline-block" method="post" action="{{route('posts.destroy', ['post' => $post->id])}}">
                <button class="btn btn-danger">Delete</button>
                @method('DELETE')
                @csrf
            </form>
        @endcan

    </div>
</div>