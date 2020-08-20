@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="jumbotron">
        <h1 class="display-4">Recent Blog Posts</h1>
    </div> --}}

    <a href="/" class="btn btn-primary">Back Home</a>

    @include('components.post', ['post' => $post])

</div>
@endsection
