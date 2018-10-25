<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.media.index', [
            'media' => MediaLibrary::first()
                ->media()
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $medium): Media
    {
        return $medium;
    }

    /**
     * Show the form to create a new resource.
     */
    public function create(Request $request): View
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediaLibraryRequest $request): RedirectResponse
    {
        $image = $request->file('image');
        $name = $image->getClientOriginalName();

        if ($request->filled('name')) {
            $name = $request->input('name');
        }

        $model = MediaLibrary::first()
            ->addMedia($image)
            ->usingName($name)
            ->toMediaCollection();

        $tags = explode(',', $request->tags);
        $model->attachTags($tags);

        return redirect()->route('admin.media.index')->withSuccess(__('media.created'));
    }

    /**
     * Show the form to edit a resource.
     */
    public function edit(Media $medium): View
    {
        $tags = implode (", ", $medium->tags->pluck('name')->toArray());
        return view('admin.media.edit', [
            'medium' => $medium,
            'tags' => $tags
        ]);
    }

    /**
     * Update media resource name and tags
     */
    public function update(Request $request, Media $medium): RedirectResponse
    {
        $model = Media::findOrFail($medium->id);
        $model->name = $request->input('name');
        $model->save();

        $tags = explode(',', $request->tags);
        $model->syncTags($tags);

        return redirect()->route('admin.media.index')->withSuccess(__('media.created'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $medium): RedirectResponse
    {
        $medium->delete();

        return redirect()->route('admin.media.index')->withSuccess(__('media.deleted'));
    }
}
