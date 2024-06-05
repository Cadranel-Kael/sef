<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ArchiveHouses extends Composer
{
    protected $acf = true;
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'archives.archive-houses',
    ];

    public function with()
    {
        return [
            'houses' => $this->houses(),
        ];
    }

    public function houses()
    {
        return collect(get_posts([
            'post_type' => 'houses',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ]))->map(function ($house) {
            $houseObject = new \stdClass();
            $houseObject->title = get_the_title($house);
            $houseObject->permalink = get_permalink($house);
            $houseObject->image = get_field('image', $house);
            $houseObject->places = get_field('places', $house);
            $houseObject->beds = get_field('beds', $house);
            $houseObject->address = get_field('address', $house);
            $houseObject->link = get_permalink($house);
            return $houseObject;
        });
    }
}
