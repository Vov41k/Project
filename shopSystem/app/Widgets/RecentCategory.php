<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Category;

class RecentCategory extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $uri = \Route::currentRouteName();
        $id=0;

        if ($uri=='category.show') {
            $id=\Route::current()->parameters['id'];
        }
        
        $categories=Category::all();
        //dd($uri);

        return view('widgets.recent_category', [
            'config' => $this->config,
            'category'=>$categories,
            'id'=>$id
        ]);
    }



}
