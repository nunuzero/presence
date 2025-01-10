<?php

namespace App\Helper;

trait ResourceTranslate
{
    public static function getModelLabel(): string
    {
        return translate(static::$title);
    }

    public static function getNavigationGroup(): string
    {
        return translate(static::$navigationGroup);
    }

    public static function getNavigationLabel(): string
    {
        return translate(static::$title);
    }

    public static function getBreadcrumb(): string
    {
        return translate(static::$title);
    }
}