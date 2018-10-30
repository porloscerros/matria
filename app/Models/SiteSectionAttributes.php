<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteSectionAttributes extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'subtitle', 'bg_img_id', 'text_color'];

    /**
     * Get the section that owns the attributes.
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(SiteSection::class, 'section_id');
    }

    /**
     * Return the sections's background image
     */
    public function bgImg(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
}
