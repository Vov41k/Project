<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsOrder extends Model
{
    protected $table    = 'products_order';
    protected $fillable = [
        'order_id',
        'product_id',
        'choisen_options',
        'quantity',
    ];

//     public function product()
//     {
//         return $this->hasMany('App\Product', 'id', 'product_id');
//     }
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');

    }
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');

    }

}
