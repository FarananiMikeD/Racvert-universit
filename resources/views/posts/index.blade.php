@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Latest Posts</h1>

        @if ($posts->count() > 0)
            <ul>
                @foreach ($posts as $post)
                    <li>
                        <h2>{{ $post->headline }}</h2>
                        <p>Author: {{ $post->author_name }}</p>
                        <p>Project Description: {{ $post->project_description }}</p>
                        <p>Created At: {{ $post->created_at }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No posts available.</p>
        @endif
    </div>
@endsection
