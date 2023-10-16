@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Post</h1>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="post">
            @csrf <!-- CSRF Token -->

            <div class="form-group">
                <label for="headline">Headline:</label>
                <input type="text" name="headline" id="headline" class="form-control" value="{{ old('headline') }}">
            </div>

            <div class="form-group">
                <label for="author_name">Author Name:</label>
                <input type="text" name="author_name" id="author_name" class="form-control" value="{{ old('author_name') }}">
            </div>

            <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" name="project_name" id="project_name" class="form-control" value="{{ old('project_name') }}">
            </div>

            <div class="form-group">
                <label for="project_description">Project Description:</label>
                <textarea name="project_description" id="project_description" class="form-control" rows="4">{{ old('project_description') }}</textarea>
            </div>

            
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="{{ config('nocaptcha.sitekey') }}"></div>

                @if ($errors->has('g-recaptcha-response'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
                @endif
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Post</button>
            </div>
        </form>
    </div>
@endsection

