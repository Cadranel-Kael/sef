<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class TitleList extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Title List';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Title List block.';

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
        'items' => [
            'Item 1',
            'Item 2',
            'Item 3',
        ]
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
            'title' => $this->title(),
            'items' => $this->items(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $titleList = Builder::make('title_list');

        $titleList
            ->addWysiwyg('heading', [
                'label' => 'Titre',
                'default_value' => $this->example['heading'],
            ])
            ->addTrueFalse('image_field', [
                'message' => 'Activer l\'image',
                'default_value' => 0,
            ])
            ->addImage('image', [
                'label' => 'Image',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'image_field',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
                'return_format' => 'id',
            ])
            ->addRepeater('items')
                ->addText('item')
            ->endRepeater();

        return $titleList->build();
    }

    public function title()
    {
        return get_field('heading', false, false) ?: $this->example['heading'];
    }

    /**
     * Retrieve the items.
     *
     * @return array
     */
    public function items()
    {
        if (have_rows('items')) {
            while (have_rows('items')) {
                the_row();
                $items[] = get_sub_field('item') ?: $this->example['items'];
            }
        } else {
            $items = $this->example['items'];
        }
        return $items;
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
