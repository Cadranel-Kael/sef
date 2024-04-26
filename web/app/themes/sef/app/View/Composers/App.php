<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'phone' => get_field('phone', 'option'),
            'email' => get_field('email', 'option'),
            'address' => get_field('address', 'option'),
            'siteLogo' => get_field('site-logo', 'option'),
            'btn1' => get_field('cta-1', 'option'),
            'btn2' => get_field('cta-2', 'option')
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }
}
