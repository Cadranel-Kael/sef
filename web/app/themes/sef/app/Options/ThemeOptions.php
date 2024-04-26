<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class ThemeOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Theme Options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Theme Options | Options';

    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $themeOptions = Builder::make('theme_options');

        $themeOptions
            ->addImage('site-logo', [
                'label' => 'Logo',
                'return_format' => 'id',
                'mime_types' => 'svg',
            ])
            ->addText('phone', [
                'label' => 'Numéro de téléphone',
            ])
            ->addText('email', [
                'label' => 'Email',
            ])
            ->addText('address', [
                'label' => 'Adresse',
            ])
            ->addLink('cta-nav-button', [
                'label' => 'Bouton de navigation CTA',
            ])
            ->addLink('cta-1', [
                'label' => 'Bouton CTA nº1',
            ])
            ->addLink('cta-2', [
                'label' => 'Bouton CTA nº2',
            ])
            ->addImage('hero-image', [
                'label' => 'Image de fond de l\'en-tête par défaut',
                'return_format' => 'id',
            ]);

        return $themeOptions->build();
    }
}
