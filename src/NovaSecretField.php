<?php

namespace Nalingia\NovaSecretField;

use Laravel\Nova\Fields\Field;

class NovaSecretField extends Field
{

    public function __construct($name, $attribute = null, callable $resolveCallback = null) {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->withMeta([
            'showCopyToClipboard' => false,
        ]);
    }

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-secret-field';

    public function showCopyToClipboard($showCopyToClipboard = true) {
        return $this->withMeta([
            'showCopyToClipboard' => $showCopyToClipboard,
        ]);
    }

    public function cannotCopyToClipboard() {
        return $this->withMeta([
            'showCopyToClipboard' => false,
        ]);
    }

    public function canCopyToClipboard() {
        return $this->withMeta([
            'showCopyToClipboard' => true,
        ]);
    }
}
