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
    </div>
</div>