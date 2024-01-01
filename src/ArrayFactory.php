<?php

namespace App;

abstract class ArrayFactory
{
    public abstract function create(
        string $className,
        array $data,
    );
}