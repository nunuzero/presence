<?php

namespace App\Helper;

trait ClusterTranslate
{
    public static function getNavigationGroup(): string
    {
        return translate(static::$navigationGroup);
    }

    public static function getNavigationLabel(): string
    {
        return translate(static::$title);
    }

    public static function getClusterBreadcrumb(): string
    {
        return translate(static::$title);
    }
}