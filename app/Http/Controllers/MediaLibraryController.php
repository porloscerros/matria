<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\MediaLibraryRequest;
use App\Models\Media;
use App\Models\MediaLibrary;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\SiteSection;

class MediaLibraryController extends Controller
{
    /**
     * Return the media library.
     */
    public function index(Request $request): View
    {
        if ($request->filled('q')) {
            $tags = preg_split("/[\s,.]+/", $request->input('q'));
            $q = preg_replace('/[^A-Za-z0-9\-]/', ' ', $request->input('q'));

            $media = MediaLibrary::first()
                ->media()
                ->where('custom_properties->public', '1')
                ->withAnyTags($tags)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $media = MediaLibrary::first()
                ->media()
                ->where('custom_properties->public', '1')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $q = '';
        }


        $section = SiteSection::where('name', 'gallery')->first();

        return view('media.index', [
            'section' => $section,
            'media' => $media,
            'q' => $q
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $medium): Media
    {
        if ($medium->getCustomProperty('public', false))
            return Redirect('media');

        return $medium;
    }

    /**
     * Display the specified resource.
     */
    public function showCard($id)
    {
        try {
            $medium = Media::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            return redirect()->route('media');
        }

        return view('media.show', [
            'medium' => $medium
        ]);

    }
}
