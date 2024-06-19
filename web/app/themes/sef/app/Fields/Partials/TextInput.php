<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class TextInput extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $textInput = Builder::make('text_input');

        $textInput
            ->addText('label', [
                'label' => 'Label',
            ])
            ->addText('placeholder', [
                'label' => 'Placeholder',
            ])
            ->addTrueFalse('required', [
                'label' => 'Champs obligatoire',
                'default_value' => 0,
            ])
            ->addNumber('min', [
                'label' => 'Minimum',
                'default_value' => 0,
            ])
            ->addNumber('max', [
                'label' => 'Maximum',
                'default_value' => 0,
            ]);

        return $textInput;
    }
}
