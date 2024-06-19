<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;
use WP_Query;

class Teams extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Teams';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Teams block.';

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
        'mode' => true,
        'multiple' => true,
        'jsx' => true,
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [];

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Teams block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'heading' => $this->heading(),
            'join_us' => $this->joinUs(),
            'teams' => $this->getTeams(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $teams = Builder::make('teams');

        $teams
            ->addWysiwyg('heading')
            ->addText('join_us');

        return $teams->build();
    }

    /**
     * Retrieve the heading.
     *
     * @return array
     */
    public function heading()
    {
        return get_field('heading', false, false);
    }

    /**
     * Retrieve the join.
     *
     * @return array
     */
    public function joinUs()
    {
        return get_field('join_us');
    }

    /**
     * Retrieve the join.
     *
     * @return WP_Query
     */
    public function getTeams()
    {
        $args = array(
            'posts_per_page'   => -1,
            'post_type'        => 'teams',
            'order'            => 'ASC',
            'post_status'      => 'publish',
        );
        return new WP_Query($args);
    }


    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
