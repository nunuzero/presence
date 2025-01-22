<?php

namespace App\Helper;

trait ClusterResourceTranslate
{
    public static function getModelLabel(): string
    {
        return translate(static::$title);
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