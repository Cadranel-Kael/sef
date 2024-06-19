<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Feature extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Feature';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Un bloc simple de titre avec un liste caractéristiques.';

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
    public $styles = [];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'heading' => 'Votre titre',
        'items' => [
            'heading' => 'Votre titre',
            'paragraph' => 'Welcome to the Feature block.',
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
            'heading' => $this->heading(),
            'items' => $this->items(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $feature = Builder::make('feature');

        $feature
            ->addWysiwyg('heading', [
                'label' => 'Titre',
                'required' => 1,
                'media_upload' => 0,
            ])
            ->addRepeater('items', [
                'layout' => 'block',
            ])
            ->addText('heading', [
                'label' => 'Titre',
                'required' => 1,
            ])
            ->addWysiwyg('paragraph', [
                'label' => 'Paragraphe',
                'required' => 1,
                'media_upload' => 0,
            ])
            ->endRepeater();

        return $feature->build();
    }

    /**
     * Retrieve the items.
     *
     * @return array
     */
    public function heading()
    {
        return get_field('heading', false, false) ?: $this->example['heading'];
    }

    public function items()
    {
        $items = collect();

        if (have_rows('items')) {
            while (have_rows('items')) {
                $itemObj = new \stdClass();
                the_row();
                $itemObj->heading = get_sub_field('heading', false) ?: $this->example['items']['heading'];
                $itemObj->paragraph = get_sub_field('paragraph', false) ?: $this->example['items']['paragraph'];
                $items->push($itemObj);
            }
        } else {
            $itemObj = new \stdClass();
            $itemObj->heading = $this->example['items']['heading'];
            $itemObj->paragraph = $this->example['items']['paragraph'];
            $items->push($itemObj);
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
