<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Latest extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Latest';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Latest block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'formatting';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The ancestor block type allow list.
     *
     * @var array
     */
    public $ancestor = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => false,
        'multiple' => true,
        'jsx' => true,
        'color' => [
            'background' => true,
            'text' => true,
            'gradient' => true,
        ],
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = ['light', 'dark'];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'items' => [
            ['item' => 'Item one'],
            ['item' => 'Item two'],
            ['item' => 'Item three'],
        ],
    ];

    /**
     * The block template.
     *
     * @var array
     */
    public $template = [
        'core/heading' => ['placeholder' => 'Hello World'],
        'core/paragraph' => ['placeholder' => 'Welcome to the Latest block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'posts' => $this->posts(),
            'link' => get_field('link') ?: '#',
        ];
    }


    /**
     * Retrieve the items.
     *
     * @return \Illuminate\Support\Collection
     */
    public function posts()
    {
        return collect(get_posts([
            'post_type' => 'news',
            'posts_per_page' => 4,
            'orderby' => 'meta_value',
            'meta_key' => 'date',
            'order' => 'DESC',
            'paged' => get_query_var('paged') ?: 1,
        ]))->map(function ($post) {
            $postObject = new \stdClass();
            $postObject->title = get_the_title($post);
            $postObject->thumbnail = get_field('thumbnail', $post);
            $postObject->article = get_field('article', $post);
            $postObject->type = !empty(get_the_terms(get_the_ID(), 'custom_category')[0]->name) ?
                get_the_terms(get_the_ID(), 'custom_category')[0]->name : '';
            $postObject->date = get_field('date', $post);
            $postObject->link = get_permalink($post);
            return $postObject;
        });
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }

    public function fields()
    {
        $latest = Builder::make('latest');

        $latest
            ->addPageLink('link', [
                'label' => 'Page d\'actualités',
            ]);

        return $latest->build();
    }
}
