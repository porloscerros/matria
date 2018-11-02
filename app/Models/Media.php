<?php

namespace App\Models;

use Spatie\MediaLibrary\Models\Media as BaseMedia;
use \Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Builder;

class Media extends BaseMedia
{
    use HasTags;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
      'posted_at'
  ];

    /**
     * Scope a query to only include posts posted last week.
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('posted_at', [carbon('1 week ago'), now()])
            ->latest();
    }
}
