<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Hero extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Hero';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Hero block.';

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
    public $mode = 'edit';

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
    public $align_content = 'left';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => false,
        'align_text' => false,
        'align_content' => false,
        'full_height' => true,
        'anchor' => false,
        'mode' => false,
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
     * The block template.
     *
     * @var array
     */
    public $template = [
        'core/heading' => ['placeholder' => 'Hello World'],
    ];

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $hero = Builder::make('hero');

        $hero
            ->addWysiwyg('heading', [
                'toolbar' => 'basic',
                'tabs' => 'visual',
                'media_upload' => false,
                'required' => true
            ])
            ->addTrueFalse('text_field', [
                'message' => 'Enable Text',
                'default_value' => 0,
            ])
            ->addWysiwyg('text', [
                'conditional_logic' => [
                    [
                        [
                            'field' => 'text_field',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
                'toolbar' => 'basic',
                'tabs' => 'visual',
                'media_upload' => false,
                'required' => false
            ])
            ->addGroup('image_field', [
                'label' => 'Image'
            ])
            ->addSelect('alignment', [
                'choices' => ['right', 'left']
            ])
            ->addImage('image', [
                'return_format' => 'id',
                'required' => true
            ])
            ->endGroup();


        return $hero->build();
    }

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'heading' => $this->heading(),
            'text' => $this->text(),
            'image' => $this->image(),
            'alignment' => $this->alignment(),
        ];
    }


    /**
     * Retrieve the header.
     *
     * @return array
     */
    public function heading()
    {
        return get_field('heading', false, false);
    }

    /**
     * Retrieve the Text.
     *
     * @return array | null
     */
    public function text()
    {
        if (get_field('text_field')) {
            return get_field('text');
        }
        return null;
    }

    /**
     * Retrieve the Alignment.
     *
     * @return string
     */
    public function alignment()
    {
        return strtolower(get_field('image_field')['alignment']);
    }

    /**
     * Retrieve the image.
     *
     * @return array
     */
    public function image()
    {
        return get_field('image_field')['image'];
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
