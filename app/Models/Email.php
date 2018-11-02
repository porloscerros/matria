<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'email', 'contact_id', 'default'];

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }
}
