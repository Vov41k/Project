<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    protected $fillable = [
        'category_name',
        'meta_tag_title',
        'description',
        'parent',
        'image',
        'colum',
        'meta_tag_keywords',
        'sort_order',
        'status',
        'filter',

    ];

}
