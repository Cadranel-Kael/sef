<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class News extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $news = Builder::make('article');

        $news
            ->setLocation('post_type', '==', 'news');

        $news
            ->addImage('thumbnail', [
                'return_format' => 'id',
                'label' => 'Vignette',
            ])
            ->addDateTimePicker('date', [
                'label' => 'Date et heure',
            ])
            ->addRepeater('content', [
                'label' => 'Contenu',
                'layout' => 'block',
            ])
            ->addText('title', [
                'label' => 'Titre',
            ])
            ->addWysiwyg('text', [
                'label' => 'Texte',
                'visual' => 1,
                'toolbar' => 'basic',
            ])
            ->endRepeater();

        return $news->build();
    }
}
