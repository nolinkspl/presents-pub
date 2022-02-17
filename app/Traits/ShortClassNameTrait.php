<?php

namespace App\Traits;

trait ShortClassNameTrait {

    public static function shortClassName(): string
    {
        return last(explode('\\', static::class));
    } 
}