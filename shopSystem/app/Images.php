<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'products_id',
        'url',

    ];

    public function product()
    {
        $this->belongsTo('App\Product');
    }
}
