<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaLibrary;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $media = MediaLibrary::first()
            ->media()
            ->where('custom_properties->published', '1')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(1, ['*'], 'gallery');

        $posts = Post::where('published', true)
            ->latest()
            ->paginate(1, ['*'], 'posts');


        return view('home', [
            'media' => $media,
            'posts' => $posts
        ]);
    }
}
