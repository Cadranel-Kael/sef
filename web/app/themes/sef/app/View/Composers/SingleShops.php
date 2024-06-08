<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class SingleShops extends Composer
{
    protected $acf = true;

    protected static $views = [
        'partials.singles.single-shops',
    ];

    public function with()
    {
        return [
            'title' => get_the_title(),
            'type' => get_field('type'),
            'location' => get_field('location'),
            'days' => $this->days(),
            'phone' => get_field('phone'),
            'website' => get_field('website'),
        ];
    }

    private function days()
    {
        $days = [
            'monday' => 'Lundi',
            'tuesday' => 'Mardi',
            'wednesday' => 'Mercredi',
            'thursday' => 'Jeudi',
            'friday' => 'Vendredi',
            'saturday' => 'Samedi',
            'sunday' => 'Dimanche',
        ];


        return collect($days)->map(function ($day, $key) {
            $dayObject = new \stdClass();
            $dayObject->name = ucfirst($day);
            if (get_field('schedule')[$key]['closed']) {
                $dayObject->hours = 'Fermé';
            } else {
                $dayObject->hours = get_field('schedule')[$key]['hours'];
            }
            return $dayObject;
        });
    }

}
