<?php

namespace App\Filament\Resources\WfhScheduleResource\Pages;

use App\Filament\Resources\WfhScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWfhSchedules extends ListRecords
{
    protected static string $resource = WfhScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
