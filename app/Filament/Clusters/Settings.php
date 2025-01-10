<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Settings extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $title = 'Settings';

    public static function getNavigationGroup(): string
    {
        return translate(static::$title);
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
