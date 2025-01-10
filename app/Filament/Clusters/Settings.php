<?php

namespace App\Filament\Clusters;

use App\Helper\ClusterTranslate;
use Filament\Clusters\Cluster;

class Settings extends Cluster
{
    use ClusterTranslate;
    
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $title = 'Settings';
}
