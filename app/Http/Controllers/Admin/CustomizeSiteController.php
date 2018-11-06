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
use Spatie\MediaLibrary\Models\Media;

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

        $customProperties = new \stdClass();

        foreach ($sections as $section) {
            $customProperties->{$section->id} = json_decode($section->custom_properties);
        }

        return view('admin.customize-site.index', [
            'sections' => $sections,
            'media' => MediaLibrary::first()->media()->get()->pluck('name', 'id'),
            'customProperties' => $customProperties
        ]);
    }

    /**
     * Update the specified section.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $customProperties = $request->except(['_method', '_token']);
            $customProperties = array_filter($customProperties);
            if (array_key_exists('bg_img_id', $customProperties)) {
                $customProperties['bg_img'] = Media::findOrFail($customProperties['bg_img_id'])->getUrl();
            }
            $customProperties = json_encode($customProperties);

            $section = SiteSection::findOrFail($id);
            $section->custom_properties = $customProperties;
            $section->save();

        } catch(\Exception $e) {
            Log::error($e->getMessage());
            Log::debug($e->getTraceAsString());
        }

        return redirect()->route('admin.customize-site.index', $section)->withSuccess(__('forms.sections.updated'));
    }
}
