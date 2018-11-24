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
use Illuminate\Support\Facades\Log;
use Spatie\ImageOptimizer\OptimizerChainFactory;

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
        try {
            $image = $request->file('image');

            $name = $image->getClientOriginalName();
            if ($request->filled('name')) {
                $name = $request->input('name');
            }

            $description = $request->filled('description') ? $request->input('description') : '';

            $public = $request->input('public');

            $model = MediaLibrary::first()
                ->addMedia($image)
                ->usingName($name)
                ->withCustomProperties(['public' => $public, 'description' => $description])
                ->toMediaCollection();

            $this->optimize(Media::latest()->first()->getPath());

            $model->attachTags($request->tags);

        } catch(\Exception $e) {
            Log::error($e->getMessage());
            Log::debug($e->getTraceAsString());
        }

        return redirect()->route('admin.media.index')->withSuccess(__('media.created'));
    }

    private function optimize ($path) {
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($path);
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
        $description = $request->filled('description') ? $request->input('description') : '';

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
