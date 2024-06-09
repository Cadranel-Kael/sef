<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ArchiveShops extends Composer
{
    protected $acf = true;

    protected static $views = [
        'partials.archives.archive-shops',
    ];

    public function with()
    {
        return [
            'shops' => $this->shops(),
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
            $shopObject->image = get_field('image', $shop);
            $shopObject->type = get_field('type', $shop);
            $shopObject->location = get_field('location', $shop);
            $shopObject->link = get_permalink($shop);
            return $shopObject;
        });
    }
}
