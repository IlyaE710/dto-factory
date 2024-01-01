<?php

namespace App\type;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class DefaultValue extends Type
{
    public function __construct(public mixed $value) {}
}