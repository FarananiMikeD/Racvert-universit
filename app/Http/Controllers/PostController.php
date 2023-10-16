<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'headline' => 'required',
            'author_name' => 'required',
            'project_name' => 'required', 
            'project_description' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $post = new Post;
        $post->headline = $request->input('headline');
        $post->author_name = $request->input('author_name');
        $post->project_name = $request->input('project_name'); 
        $post->project_description = $request->input('project_description'); 
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }
}
