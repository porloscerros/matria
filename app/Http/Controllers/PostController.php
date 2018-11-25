<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\SiteSection;

class PostController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(Request $request): View
    {
        $posts = Post::search($request->input('q'))
            ->where('public', true)
            ->with('author')
            ->withCount('thumbnail')
            ->orderBy('posted_at')
            ->paginate(10);

        $section = SiteSection::where('name', 'posts')
            ->first();

        return view('posts.index', [
            'section' => $section,
            'posts' => $posts
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Post $post): View
    {
        $section = SiteSection::where('name', 'posts')
            ->first();

        return view('posts.show', [
            'section' => $section,
            'post' => $post
        ]);
    }
}
