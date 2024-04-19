<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class ImageParagraph extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Image Paragraph';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Image Paragraph block.';

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
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'heading' => $this->heading(),
            'paragraph' => $this->paragraph(),
            'image' => $this->image(),
            'alignment' => $this->alignment(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $imageParagraph = Builder::make('image_paragraph');

        $imageParagraph
            ->addWysiwyg('heading', [
                'toolbar' => 'basic',
                'tabs' => 'visual',
                'media_upload' => false,
                'required' => true
            ])
            ->addWysiwyg('paragraph', [
                'toolbar' => 'basic',
                'tabs' => 'visual',
                'media_upload' => false,
                'required' => true
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

        return $imageParagraph->build();
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
     * Retrieve the paragraph.
     *
     * @return array
     */
    public function paragraph()
    {
        return get_field('paragraph', false, false);
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
