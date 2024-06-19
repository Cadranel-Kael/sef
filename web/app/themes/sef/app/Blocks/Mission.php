<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Mission extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Mission';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Mission block.';

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
        'heading' => 'Votre titre',
        'description' => 'Votre description',
        'steps' => [
            [
                'heading' => 'Votre titre',
                'description' => 'Votre description',
            ],
            [
                'heading' => 'Votre titre',
                'description' => 'Votre description',
            ],
            [
                'heading' => 'Votre titre',
                'description' => 'Votre description',
            ],
        ],
    ];

    /**
     * The block template.
     *
     * @var array
     */
    public $template = [];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'heading' => get_field('heading', false, false) ?: $this->example['heading'],
            'description' => get_field('description', false, false) ?: $this->example['description'],
            'steps' => $this->steps(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $mission = Builder::make('mission');

        $mission
            ->addWysiwyg('heading', [
                'label' => 'Titre',
                'required' => 1,
                'media_upload' => 0,
            ])
            ->addWysiwyg('description', [
                'label' => 'Description',
                'media_upload' => 0,
            ])
            ->addRepeater('steps', [
                'layout' => 'block',
                'label' => 'Étapes',
            ])
            ->addText('heading', [
                'label' => 'Titre',
                'required' => 1,
            ])
            ->addWysiwyg('description', [
                'label' => 'Description',
                'media_upload' => 0,
                'required' => 1,
            ])
            ->endRepeater();

        return $mission->build();
    }

    /**
     * Retrieve the items.
     *
     * @return \Illuminate\Support\Collection
     */
    public function steps(): \Illuminate\Support\Collection
    {
        $steps = collect();

        if (have_rows('steps')) {
            while (have_rows('steps')) {
                the_row();
                $obj = new \stdClass();

                $obj->heading = get_sub_field('heading') ?: $this->example['steps']['heading'];
                $obj->description = get_sub_field('description', false) ?: $this->example['steps']['description'];

                $steps->push($obj);
            }
        } else {
            foreach ($this->example['steps'] as $step) {
                $obj = new \stdClass();

                $obj->heading = $step['heading'];
                $obj->description = $step['description'];

                $steps->push($obj);
            }
        }

        return $steps;
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
