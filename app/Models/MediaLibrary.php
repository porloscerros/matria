<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Support\Facades\Log;

class MediaLibrary extends Model implements HasMedia
{
    use HasMediaTrait;

    public function registerMediaConversions(Media $media = null): void
    {
        try {
            $this->addMediaConversion('thumb')
                ->width(350)
                ->height(250);

        } catch(\Exception $e) {
            Log::error($e->getMessage());
            Log::debug($e->getTraceAsString());
        }
    }
}
