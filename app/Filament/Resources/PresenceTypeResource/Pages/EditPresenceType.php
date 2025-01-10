<?php

namespace App\Filament\Resources\PresenceTypeResource\Pages;

use App\Filament\Resources\PresenceTypeResource;
use App\Helper\RedirectToListPage;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPresenceType extends EditRecord
{
    use RedirectToListPage;
    
    protected static string $resource = PresenceTypeResource::class;
}
