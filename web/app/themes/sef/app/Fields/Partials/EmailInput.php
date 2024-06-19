<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class EmailInput extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $emailInput = Builder::make('email_input');

        $emailInput
            ->addText('label', [
                'label' => 'Label',
            ])
            ->addText('placeholder', [
                'label' => 'Placeholder',
            ])
            ->addTrueFalse('required', [
                'label' => 'Champs obligatoire',
                'default_value' => 0,
            ]);

        return $emailInput;
    }
}
