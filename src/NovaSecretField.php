<?php

namespace Nalingia\NovaSecretField;

use Laravel\Nova\Fields\Field;

class NovaSecretField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-secret-field';
}
