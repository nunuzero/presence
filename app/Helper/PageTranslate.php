<?php

namespace App\Helper;

use Illuminate\Contracts\Support\Htmlable;

trait PageTranslate
{
    public function getTitle(): string | Htmlable
    {
        return translate(static::$title);
    }

    public static function getNavigationLabel(): string
    {
        return translate(static::$title);
    }
}