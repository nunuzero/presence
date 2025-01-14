<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Resources\StaffResource;
use App\Helper\RedirectToListPage;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaff extends EditRecord
{
    use RedirectToListPage;
    
    protected static string $resource = StaffResource::class;
}
