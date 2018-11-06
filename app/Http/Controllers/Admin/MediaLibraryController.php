<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MediaLibraryRequest;
use App\Models\Media;
use App\Models\MediaLibrary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Tags\Tag;

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
        return view('admin.media.create', [
            'tags_list' => Tag::all()->pluck('name')->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediaLibraryRequest $request): RedirectResponse
    {
        $image = $request->file('image');
        $name = $image->getClientOriginalName();
        $public = $request->input('public');
        if ($request->filled('description')) {
            $description = '<p class="text-center">';
            $description .= $request->input('description');
            $description .=  '</p>';
        }

        if ($request->filled('name')) {
            $name = $request->input('name');
        }

        $model = MediaLibrary::first()
            ->addMedia($image)
            ->usingName($name)
            ->withCustomProperties(['public' => $public, 'description' => $description])
            ->toMediaCollection();

        $model->attachTags($request->tags);

        return redirect()->route('admin.media.index')->withSuccess(__('media.created'));
    }

    /**
     * Show the form to edit a resource.
     */
    public function edit(Media $medium): View
    {
        return view('admin.media.edit', [
            'medium' => $medium,
            'tags' => $medium->tags->pluck('name')->toArray(),
            'public' => $medium->getCustomProperty('public'),
            'description' => $medium->getCustomProperty('description'),
            'tags_list' => Tag::all()->pluck('name')->toArray(),
        ]);
    }

    /**
     * Update media resource name and tags
     */
    public function update(Request $request, Media $medium): RedirectResponse
    {
        if ($request->filled('description')) {
            $description = '<p class="text-center">';
            $description .= $request->input('description');
            $description .=  '</p>';
        }
        $model = Media::findOrFail($medium->id);
        $model->name = $request->input('name');
        $model->setCustomProperty('public', $request->input('public'));
        $model->setCustomProperty('description', $description);
        $model->save();

        $model->syncTags($request->tags);

        return redirect()->route('admin.media.index')->withSuccess(__('media.updated'));
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
