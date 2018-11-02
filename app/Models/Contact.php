<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Contact extends Model
{

    protected $fillable = ['id', 'name'];

    public function emails()
    {
        return $this->hasMany('App\Models\Email');
    }

    public function defaultEmail()
    {
        return $this->hasOne('App\Models\Email')
            ->where('default', true);
    }

    /**
     * Scope a query to only include contacts created last week.
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('created_at', [carbon('1 week ago'), now()])
            ->latest();
    }
}
