<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class SingleNews extends Composer
{
    protected $acf = true;

    protected static $views = [
        'partials.singles.single-news',
    ];

    public function with()
    {
        return [
            'title' => get_the_title(),
            'thumbnail' => get_field('thumbnail'),
            'article' => get_field('article'),
        ];
    }
}
