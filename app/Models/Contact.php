<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
