<?php

namespace App\View\Composers;

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
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
        ]))->map(function ($news) {
            $newsObject = new \stdClass();
            $newsObject->title = get_the_title($news);
            $newsObject->thumbnail = get_field('thumbnail', $news);
            $newsObject->article = get_field('article', $news);
            $newsObject->type = get_the_terms(get_the_ID(), 'custom_category')[0]->name;
            $newsObject->date = human_time_diff_fr(strtotime(get_field('date')), current_time('timestamp'));
            $newsObject->link = get_permalink($news);
            return $newsObject;
        });
    }
}
