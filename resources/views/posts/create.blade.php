@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Display Errors: --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <h3>New Post</h3>
    <form method="post" action="{{route('posts.store')}}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input 
                type="text" 
                name="title" 
                class="form-control @error('title') is-invalid @enderror" 
                id="title" 
                aria-describedby="emailHelp" 
                placeholder="Post Title"
                value="{{ old('title') }}"
            >
        </div>
        <div class="form-group">
            <label for="content">Post Content</label>
            <textarea 
                class="form-control @error('body') is-invalid @enderror" 
                name="body" 
                id="content" 
                rows="8">{{ old('body') }}</textarea>
        </div>
        <button class="btn btn-primary">Submit</button>
        <a href="/home" class="btn btn-secondary">Cancel</a>
   </form>
</div>
@endsection
