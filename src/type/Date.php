<?php

namespace App\type;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Date extends Type
{
    public function __construct(public string $format = 'Y-m-d') {}
}