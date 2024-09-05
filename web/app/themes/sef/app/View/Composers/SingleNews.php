<?php

namespace App\View\Composers;

use Carbon\Carbon;
use DateTimeImmutable;
use IntlDateFormatter;
use Roots\Acorn\View\Composer;

class SingleNews extends Composer
{
    protected static $views = [
        'partials.singles.single-news',
    ];

    public function with()
    {
        return [
            'title' => get_the_title(),
            'thumbnail' => get_field('thumbnail'),
            'articles' => $this->articles(),
            'date' => $this->date(),
            'latest' => $this->latest(),
        ];
    }

    public function articles()
    {
        if (get_field('content')) {
            return collect(get_field('content'))->map(function ($content) {
                $contentObject = new \stdClass();
                $contentObject->title = $content['title'];
                $contentObject->text = $content['text'];
                return $contentObject;
            });
        }
        return null;
    }

    public function date(): string
    {
        return Carbon::createFromFormat(
            'd/m/Y h:i a',
            get_field('date')
        )->locale('fr_FR')->isoFormat('LL');
    }

    public function latest()
    {
        $wpQuery = new \WP_Query([
            'post_type' => 'news',
            'posts_per_page' => 3,
            'sort' => 'DESC',
            'orderby' => 'meta_value',
            'meta_key' => 'date',
            'post__not_in' => [get_the_ID()],
        ]);


        return collect($wpQuery->posts)->map(function ($post) {
            $postObject = new \stdClass();
            $postObject->title = get_the_title();
            $postObject->type = get_the_terms(get_the_ID(), 'custom_category')[0]->name ?? 'Nouvelles';
            $postObject->thumbnail = get_field('thumbnail', $post->ID);
            $postObject->date = get_field('date', $post);
            $postObject->link = get_permalink($post->ID);
            return $postObject;
        });
    }
}
