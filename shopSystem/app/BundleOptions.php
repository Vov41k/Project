<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BundleOptions extends Model
{
    protected $fillable = ['product_id', 'options_id', 'qty', 'image'];

    public function option()
    {
        return $this->hasMany('App\Options', 'id', 'options_id');
    }
    public function products()
    {
        return $this->hasMany('App\Product', 'id', 'product_id');
    }
}
