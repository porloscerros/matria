<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteSection extends Model
{
    public $timestamps = false;

    /**
     * Get the attributes for the section.
     */
    public function custom(): HasOne
    {
        return $this->hasOne(SiteSectionAttributes::class);
    }
}
