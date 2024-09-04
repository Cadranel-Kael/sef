<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Single extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'single',
        'partials.singles.*',
    ];

    public function with()
    {
        return [
        ];
    }
}
