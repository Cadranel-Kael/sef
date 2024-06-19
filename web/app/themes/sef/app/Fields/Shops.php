<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Shops extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $shops = Builder::make('shops');

        $shops
            ->setLocation('post_type', '==', 'shops');

        $shops
            ->addText('type', [
                'label' => 'Type',
            ])
            ->addImage('image', [
                'label' => 'Image',
                'return_format' => 'id',
            ])
            ->addText('location', [
                'label' => 'Address',
                'instructions' => 'Format: Rue du marché 35, 4500 Huy, Belgique',
            ])
            ->addGroup('schedule', [
                'label' => 'Horaire',
                'layout' => 'table',
                'instructions' => 'Format: 10h - 18h',
            ])
            ->addGroup('monday', [
                'label' => 'Lundi',
            ])
            ->addTrueFalse('closed', [
                'label' => 'Fermé',
                'value' => 0,
            ])
            ->addText('hours', [
                'label' => 'Heures',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'closed',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
            ])
            ->endGroup()
            ->addGroup('tuesday', [
                'label' => 'Mardi',
            ])
            ->addTrueFalse('closed', [
                'label' => 'Fermé',
                'value' => 0,
            ])
            ->addText('hours', [
                'label' => 'Heures',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'closed',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
            ])
            ->endGroup()
            ->addGroup('wednesday', [
                'label' => 'Mercredi',
            ])
            ->addTrueFalse('closed', [
                'label' => 'Fermé',
                'value' => 0,
            ])
            ->addText('hours', [
                'label' => 'Heures',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'closed',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
            ])
            ->endGroup()
            ->addGroup('thursday', [
                'label' => 'Jeudi',
            ])
            ->addTrueFalse('closed', [
                'label' => 'Fermé',
                'value' => 0,
            ])
            ->addText('hours', [
                'label' => 'Heures',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'closed',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
            ])
            ->endGroup()
            ->addGroup('friday', [
                'label' => 'Vendredi',
            ])
            ->addTrueFalse('closed', [
                'label' => 'Fermé',
                'value' => 0,
            ])
            ->addText('hours', [
                'label' => 'Heures',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'closed',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
            ])
            ->endGroup()
            ->addGroup('saturday', [
                'label' => 'Samedi',
            ])
            ->addTrueFalse('closed', [
                'label' => 'Fermé',
                'value' => 0,
            ])
            ->addText('hours', [
                'label' => 'Heures',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'closed',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
            ])
            ->endGroup()
            ->addGroup('sunday', [
                'label' => 'Dimanche',
            ])
            ->addTrueFalse('closed', [
                'label' => 'Fermé',
                'value' => 0,
            ])
            ->addText('hours', [
                'label' => 'Heures',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'closed',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
            ])
            ->endGroup()
            ->endGroup()
            ->addText('phone', [
                'label' => 'Téléphone',
                'instructions' => 'Format: +32 85 21 21 21',
            ])
            ->addUrl('website', [
                'label' => 'Site web',
            ]);

        $shops
            ->setGroupConfig('hide_on_screen', ['the_content'])
            ->setGroupConfig('style', 'seamless');

        return $shops->build();
    }
}
