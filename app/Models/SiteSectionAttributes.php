<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Collective\Html\Eloquent\FormAccessible;

class SiteSectionAttributes extends Model
{
    use FormAccessible;

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
    public function background(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'bg_img_id');
    }

    /**
     * Return the sections's background image
     */
    public function formBgImgId(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'bg_img_id');
    }

    /**
     * return true if the post has a thumbnail
     */
    public function hasBackground(): bool
    {
        return filled($this->bg_img_id);
    }
}
