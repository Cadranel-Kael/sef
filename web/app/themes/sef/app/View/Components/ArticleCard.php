<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\View\Component;

class ArticleCard extends Component
{
    public $title;
    public $thumbnail;
    public $article;
    public $type;
    public $date;
    public $link;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title,
        string $thumbnail,
        string $type,
        string $date,
        string $link
    ) {
        $this->title = $title;
        $this->thumbnail = $thumbnail;
        if (!$thumbnail) {
            $this->thumbnail = get_field('article-image', 'option');
        }
        $this->type = $type;
        $this->date = $date;
        if ($this->date) {
            $this->date = $this->formatDate($date);
        }
        $this->link = $link;
    }

    public function formatDate($date): string
    {
        return ucfirst(Carbon::createFromFormat(
            'd/m/Y h:i a',
            $date
        )->locale('fr_FR')->diffForHumans());
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article-card');
    }
}
