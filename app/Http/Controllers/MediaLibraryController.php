<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\MediaLibraryRequest;
use App\Models\Media;
use App\Models\MediaLibrary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MediaLibraryController extends Controller
{
    /**
     * Return the media library.
     */
    public function index(Request $request): View
    {
        $media = MediaLibrary::first()
            ->media()
            ->where('custom_properties->published', '1')
            ->paginate(10);

        return view('media.index', [
            'media' => $media
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $medium): Media
    {
        return $medium;
    }
}
