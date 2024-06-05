<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ArchiveShops extends Composer
{
    protected $acf = true;

    protected static $views = [
        'archive-shops',
    ];

    public function with()
    {
        return [
            'houses' => $this->shops(),
        ];
    }

    public function shops()
    {
        return collect(get_posts([
            'post_type' => 'shops',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ]))->map(function ($shop) {
            $shopObject = new \stdClass();
            $shopObject->title = get_the_title($shop);
            $shopObject->permalink = get_permalink($shop);
            $shopObject->image = get_field('image', $shop);
            $shopObject->places = get_field('places', $shop);
            $shopObject->beds = get_field('beds', $shop);
            $shopObject->address = get_field('address', $shop);
            $shopObject->link = get_permalink($shop);
            return $shopObject;
        });
    }
}
