<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteSection extends Model
{
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
        if ($this->getCustomProperty('fb_page') || $this->getCustomProperty('instagram') || $this->getCustomProperty('twitter') || $this->getCustomProperty('google_plus')) {
            return true;
        }

        return false;
    }

}
