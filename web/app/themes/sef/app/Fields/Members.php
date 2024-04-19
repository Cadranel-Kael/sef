<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Members extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $team = Builder::make('members');

        $team
            ->setLocation('post_type', '==', 'teams');

        $team
            ->addRepeater('member')
            ->addText('full_name')
            ->addImage('image', ['return_format' => 'id'])
            ->endRepeater();

        return $team->build();
    }
}
