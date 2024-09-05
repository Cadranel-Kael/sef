<?php

namespace App\View\Composers;

use Carbon\Carbon;
use Roots\Acorn\View\Composer;

class ArchiveNews extends Composer
{
    protected $acf = true;

    protected static $views = [
        'partials.archives.archive-news',
    ];

    public function with()
    {
        return [
            'news' => $this->news(),
        ];
    }

    public function news()
    {
        return collect(get_posts([
            'post_type' => 'news',
            'posts_per_page' => 8,
            'orderby' => 'meta_value',
            'meta_key' => 'date',
            'order' => 'DESC',
            'paged' => get_query_var('paged') ?: 1,
        ]))->map(function ($news) {
            $newsObject = new \stdClass();
            $newsObject->title = get_the_title($news);
            $newsObject->thumbnail = get_field('thumbnail', $news);
            $newsObject->article = get_field('article', $news);
            $newsObject->type = get_the_terms(get_the_ID(), 'custom_category')[0]->name ?? 'Nouvelles';
            $newsObject->date = get_field('date', $news);
            $newsObject->link = get_permalink($news);
            return $newsObject;
        });
    }
}
