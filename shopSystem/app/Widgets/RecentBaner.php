<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\News;

class RecentBaner extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [  
            
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        // $news=News::take($this->config['count'])->get();
        $banners = [
            [
                'image'=>asset('images/t1.jpg'),
                'url'=>'#'
            ],
                        [
                'image'=>asset('images/t2.jpg'),
                'url'=>'#'
            ],
            [
                'image'=>asset('images/t3.jpg'),
                'url'=>'#'
            ],    [
                'image'=>asset('images/t4.jpg'),
                'url'=>'#'
            ],
        ];
        
        return view('widgets.recent_baner', [
            
            'config' => $this->config,
            'banners'=>$banners
            
        ]);
    }
}
