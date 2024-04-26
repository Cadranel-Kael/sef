<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class House extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $house = Builder::make('house');

        $house
            ->setLocation('post_type', '==', 'housing');

        $house
            ->addImage('image', ['return_format' => 'id'])
            ->addText('places', [
                'label' => 'Number of spaces per year',
            ])
            ->addText('beds', [
                'label' => 'Number of emergency beds',
            ])
            ->addText('address', [
                'label' => 'Address of the home',
                'instructions' => 'Format: Rue du marché 35, 4500 Huy, Belgium',
            ]);

        $house
            ->setGroupConfig('hide_on_screen', ['the_content'])
            ->setGroupConfig('style', 'seamless');

        return $house->build();
    }
}
