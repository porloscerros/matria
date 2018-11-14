<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Image\Manipulations;

class SiteSection extends Model implements HasMedia
{
    use HasMediaTrait;

    public $timestamps = false;

    protected $fillable = [
        'custom_properties'
    ];

    /**
     * Determine if the section has a custom property with the given name.
     *
     * @param string $propertyName
     *
     * @param array $default
     *
     * @return mixed
     */
    public function hasCustomProperty(string $propertyName, $default = []): bool
    {
        return array_key_exists($propertyName, json_decode($this->custom_properties)?: $default);
    }

    /**
     * Get the value of custom property with the given name.
     *
     * @param string $propertyName
     *
     * @return mixed
     */
    public function getCustomProperty(string $propertyName)
    {
        $custom_properties = json_decode($this->custom_properties);
        $property = $custom_properties->{$propertyName};

        return $property;
    }

    /**
     * return true if the section contact-us has any social media data
     */
    public function hasSocialMedia(): bool
    {
        if ($this->hasCustomProperty('fb_page') || $this->hasCustomProperty('instagram') || $this->hasCustomProperty('twitter') || $this->hasCustomProperty('google_plus')) {
            return true;
        }

        return false;
    }

    /**
     * return true if the section has a custom background
     */
    public function hasBackground(): bool
    {
        if ($this->hasMedia('sections-background'))
        return filled($this->thumbnail_id);
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('sections-background')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('bg')
                    ->nonQueued()
                    ->fit(Manipulations::FIT_MAX, 1080, 720)
                    ->optimize();
            });
    }
}
