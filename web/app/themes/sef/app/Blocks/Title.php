<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Title extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Title';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Title block.';

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
    public $icon = 'dashicons-heading';

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
        'anchor' => true,
        'mode' => false,
        'multiple' => true,
        'jsx' => true,
        'color' => [
            'background' => true,
            'text' => true,
        ],
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
        'heading' => 'Votre titre ici',
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
            'heading' => $this->heading(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $title = Builder::make('title');

        $title
            ->addWysiwyg('heading', [
                'label' => 'Titrage',
                'required' => true,
                'media_upload' => false,
                'toolbar' => 'basic',
            ])
            ->addSelect('level', [
                'instructions' => 'Le niveau un est reservé pour les titres de page.',
                'label' => 'Niveau de titrage',
                'required' => true,
                'choices' => [
                    1 => 'Niveau 1',
                    2 => 'Niveau 2',
                    3 => 'Niveau 3',
                    4 => 'Niveau 4',
                    5 => 'Niveau 5',
                    6 => 'Niveau 6',
                ],
                'default_value' => 2,
            ]);

        return $title->build();
    }

    public function heading()
    {
        if (!get_field('heading')) {
            return null;
        }
        return sprintf(
            "<%s>%s</%s>",
            get_field('level'),
            get_field('heading', false, false),
            get_field('level')
        );
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
