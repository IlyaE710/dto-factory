<?php

namespace App;

#[\Attribute]
final class Map
{
    public function __construct(
        public readonly string $path,
    ) {
    }
}
