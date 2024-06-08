<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Archive extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'archive',
        'partials.archives.*',
    ];

    public function with()
    {
        return [
            'title' => $this->title(),
        ];
    }

    public function title()
    {
        return get_queried_object()->label;
    }
}
