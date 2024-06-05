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
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = 'center';

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
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => true,
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
     * The block template.
     *
     * @var array
     */
    public $template = [];

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $hero = Builder::make('hero');

        $hero
            ->addWysiwyg('heading', [
                'label' => 'Titrage',
                'toolbar' => 'basic',
                'tabs' => 'visual',
                'media_upload' => false,
                'required' => true
            ])
            ->addSelect('heading-level', [
                'label' => __('Niveau de titrage'),
                'choices' => [
                    'h2' => '1',
                    'h3' => '2',
                    'h4' => '3',
                    'h5' => '4',
                    'h6' => '5',
                ],
                'default_value' => 'h2',
            ])
            ->addTrueFalse('text_field', [
                'message' => 'Activer le texte',
                'default_value' => 0,
            ])
            ->addWysiwyg('text', [
                'label' => 'Texte',
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
            ->addTrueFalse('default-background', [
                'message' => 'Activer l\'image de fond par défaut. (Trouvé dans les options du thème)',
                'default_value' => 1,
            ])
            ->addImage('background-image', [
                'label' => 'Image de fond',
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
                'required' => true,
            ])
            ->addGroup('image_field', [
                'label' => 'Image',
            ])
            ->addSelect('alignment', [
                'choices' => ['right', 'left']
            ])
            ->addImage('image', [
                'return_format' => 'id',
                'required' => true,
                'instructions' => 'Utiliser une image sans fond pour de meilleurs résultats.',
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
            'background' => $this->background(),
        ];
    }


    /**
     * Retrieve the header.
     *
     * @return string
     */
    public function heading()
    {
        return sprintf(
            "<%s class='hero__title'>%s</%s>",
            get_field('heading-level'),
            get_field('heading', false, false),
            get_field('heading-level')
        );
    }

    /**
     * Retrieve the Text.
     *
     * @return array | null
     */
    public function text()
    {
        if (get_field('text_field')) {
            return get_field('text', false, false);
        }
        return null;
    }

    /**
     * Retrieve the background image personalised or the default one.
     *
     * @return array
     */
    public function background()
    {
        if (get_field('default-background')) {
            return get_field('hero-image', 'option');
        }
        return get_field('background-image');
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
