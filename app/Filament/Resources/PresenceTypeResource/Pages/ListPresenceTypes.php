<?php

namespace App\Filament\Resources\PresenceTypeResource\Pages;

use App\Filament\Resources\PresenceTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPresenceTypes extends ListRecords
{
    protected static string $resource = PresenceTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
