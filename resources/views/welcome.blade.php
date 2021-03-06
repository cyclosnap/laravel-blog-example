@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Recent Blog Posts</h1>
    </div>

    {{ $posts->links() }}

    @each('components.post', $posts, 'post', 'components.postempty')

    {{ $posts->links() }}
</div>
@endsection
