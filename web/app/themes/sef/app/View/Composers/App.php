<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    public $title;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
        'archives/*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'showTitle' => false,
            'title' => $this->title,
            'siteName' => $this->siteName(),
            'phone' => get_field('phone', 'option'),
            'email' => get_field('email', 'option'),
            'address' => get_field('address', 'option'),
            'siteLogo' => get_field('site-logo', 'option'),
            'btn1' => get_field('cta-1', 'option'),
            'btn2' => get_field('cta-2', 'option'),
            'background' => $this->background(),
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

    public function background()
    {
        if (get_page_template_slug(get_queried_object_id()) === 'template-donation.blade.php') {
            return get_field('donation-image', 'option');
        }
        if (get_page_template_slug(get_queried_object_id()) === 'template-contact.blade.php') {
            return get_field('contact-image', 'option');
        }
    }
}
