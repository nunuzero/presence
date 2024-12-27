<?php

namespace App\Filament\Clusters\Settings\Resources\WorkTimeResource\Pages;

use App\Filament\Clusters\Settings\Resources\WorkTimeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkTimes extends ListRecords
{
    protected static string $resource = WorkTimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
