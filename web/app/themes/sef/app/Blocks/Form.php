<?php

namespace App\Blocks;

use App\Fields\Partials\EmailInput;
use App\Fields\Partials\RadioInput;
use App\Fields\Partials\TextInput;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Form extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Form';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Form block.';

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
        'submit' => 'Envoyer',
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
            'submit' => get_field('submit') ?: $this->example['submit'],
            'fields' => $this->flexFields(),
        ];
    }

    public function fields(): array
    {
        $form = Builder::make('form');

        $form
            ->addText('submit', [
                'label' => 'Texte du bouton de soumission',
            ])
            ->addFlexibleContent('field', [
                'button_label' => 'Ajouter un champ',
            ])
            ->addLayout('text_input', [
                'label' => 'Champ texte',
            ])
            ->addPartial(TextInput::class)
            ->addLayout('email_input', [
                'label' => 'Champ Email',
            ])
            ->addPartial(EmailInput::class)
            ->addLayout('radio_input', [
                'label' => 'Champ multiple choix',
            ])
            ->addPartial(RadioInput::class);
        return $form->build();
    }

    public function flexFields()
    {
        $forms =  collect();

        if (have_rows('field')) {
            while (have_rows('field')) {
                the_row();
                $obj = new \stdClass();

                $obj->type = get_row_layout();
                $obj->label = get_sub_field('label')?: false;
                $obj->required = get_sub_field('required')?: false;
                $obj->placeholder = get_sub_field('placeholder')?: false;
                $obj->choices = get_sub_field('choices')?: false;
                $obj->min = get_sub_field('min')?: false;
                $obj->max = get_sub_field('max')?: false;

                $forms->push($obj);
            }
        }

        return $forms;
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
