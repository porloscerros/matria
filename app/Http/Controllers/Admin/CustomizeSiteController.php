<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomizeSiteRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\SiteSection;
use App\Models\SiteSectionAttributes;
use App\Models\MediaLibrary;
use Illuminate\Support\Facades\Log;

class CustomizeSiteController extends Controller
{
    /**
     * Show the customize site index.
     */
    public function index(): View
    {
        $colors = [
            "text-primary"=>'Primary',
            "text-secondary"=>'Secondary',
            "text-success"=>'Success',
            "text-danger"=>'Danger',
            "text-warning"=>'Warning',
            "text-info"=>'Info',
            "text-light"=>'Light',
            "text-dark"=>'Dark',
            "text-muted"=>'Muted',
            "text-white"=>'White'
        ];

        $sections = SiteSection::where('public', true)
            ->get();

        return view('admin.customize-site.index', [
            'sections' => $sections,
            'media' => MediaLibrary::first()->media()->get()->pluck('name', 'id'),
            'colors' => $colors
        ]);
    }

    /**
     * Update the specified section.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $section = SiteSectionAttributes::findOrFail($id);
            $section->update($request->only(['title', 'subtitle', 'bg_img_id', 'text_color']));

        } catch(\Exception $e) {
            Log::error($e->getMessage());
            Log::debug($e->getTraceAsString());
        }

        return redirect()->route('admin.customize-site.index', $section)->withSuccess(__('forms.sections.updated'));
    }
}
