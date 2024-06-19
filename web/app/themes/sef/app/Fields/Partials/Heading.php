<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Heading extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $heading = Builder::make('heading');

        $heading
            ->addSelect('heading_level', [
                'label' => 'Niveau de titre',
                'instructions' => 'Attention le niveau h1 est normalement reservé pour le titre de la page.',
                'choices' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
                'default_value' => 'h2',
            ])
            ->addWysiwyg('heading', [
                'label' => 'Titre',
                'media_upload' => 0,
                'tabs' => 'visual',
                'toolbar' => 'basic',
            ]);

        return $heading;
    }
}
