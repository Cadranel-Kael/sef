<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class RadioInput extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $radioInput = Builder::make('radio_input');

        $radioInput
            ->addText('label', [
                'label' => 'Label',
            ])
            ->addTrueFalse('required', [
                'label' => 'Champs obligatoire',
                'default_value' => 0,
            ])
            ->addRepeater('choices', [
                'label' => 'Choix',
                'layout' => 'block',
            ])
            ->addText('label', [
                'label' => 'Label',
            ])
            ->addText('value', [
                'label' => 'Valeur',
            ])
            ->endRepeater();

        return $radioInput;
    }
}
