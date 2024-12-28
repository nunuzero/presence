<?php

namespace App\Filament\Resources\PresenceTypeResource\Pages;

use App\Filament\Resources\PresenceTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPresenceType extends EditRecord
{
    protected static string $resource = PresenceTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
}
