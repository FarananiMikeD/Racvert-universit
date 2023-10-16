@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Latest Posts</h1>

        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div class="post">
                    <h2>{{ $post->headline }}</h2>
                    <p>Author: {{ $post->author_name }}</p>
                    <p>Project Name: {{ $post->project_name }}</p>
                    <p>Project Description: {{ $post->project_description }}</p>
                    <p>Created At: {{ $post->created_at }}</p>
                </div>
            @endforeach
        @else
            <p>No posts available.</p>
        @endif
    </div>
@endsection
