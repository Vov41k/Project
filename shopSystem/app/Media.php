<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    protected $fillable = [
        'title',
        'type',
        'url',

    ];

    public function getImageAttribute($url)
    {
        return asset($url) ?? '';
    }

}
