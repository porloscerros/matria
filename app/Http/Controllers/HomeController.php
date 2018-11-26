<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSection;
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
            ->where('custom_properties->public', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(1, ['*'], 'gallery');

        $posts = Post::where('public', true)
            ->paginate(1, ['*'], 'posts');

        $sections = SiteSection::where('public', true)
            ->get();


        return view('home', [
            'sections' => $sections,
            'media' => $media,
            'posts' => $posts
        ]);
    }
}
