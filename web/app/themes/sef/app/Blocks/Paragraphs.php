<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Paragraphs extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Paragraphs';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Paragraphs block.';

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
        'heading' => 'Votre titre',
        'text' => 'Votre texte',
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
            'blocks' => $this->blocks(),
            'example' => $this->example,
            'background_decoration' => get_field('background_decoration') ?: '0',
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $paragraphs = Builder::make('paragraphs');

        $paragraphs
            ->addTrueFalse('background_decoration', [
                'message' => 'Activer la décoration de fond',
                'default_value' => 0,
            ])
            ->addRepeater('blocks', [
                'layout' => 'block',
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
            ->addRadio('length', [
                'label' => 'Longueur de l’image',
                'choices' => [
                    'short' => 'Court',
                    'half' => 'Moitié de la section',
                    'full' => 'Toute la largeur',
                ],
                'default_value' => 'short',
            ])
            ->addWysiwyg('heading', [
                'toolbar' => 'basic',
                'tabs' => 'visual',
                'media_upload' => false,
                'required' => true
            ])
            ->addWysiwyg('text', [
                'toolbar' => 'basic',
                'tabs' => 'visual',
                'media_upload' => false,
                'required' => true
            ])
            ->endRepeater();

        return $paragraphs->build();
    }

    /**
     * Retrieve the items.
     *
     */
    public function blocks()
    {
        $blocks = collect();

        if (have_rows('blocks')) {
            while (have_rows('blocks')) {
                the_row();
                $blockObj = new \stdClass();
                $blockObj->image_field = get_sub_field('image_field') ?: false;
                $blockObj->image = get_sub_field('image') ?: false;
                $blockObj->lenght = get_sub_field('length') ?: 'short';
                $blockObj->heading = get_sub_field('heading') ?: $this->example['heading'];
                $blockObj->text = get_sub_field('text', false) ?: $this->example['text'];
                $blocks->push($blockObj);
            }
        } else {
            $blockObj = new \stdClass();
            $blockObj->image_field = false;
            $blockObj->heading = $this->example['heading'];
            $blockObj->text = $this->example['text'];
            $blocks->push($blockObj);
        }

        return $blocks;
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
