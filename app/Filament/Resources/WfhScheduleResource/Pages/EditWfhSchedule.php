<?php

namespace App\Filament\Resources\WfhScheduleResource\Pages;

use App\Filament\Resources\WfhScheduleResource;
use App\Helper\RedirectToListPage;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWfhSchedule extends EditRecord
{
    use RedirectToListPage;
    
    protected static string $resource = WfhScheduleResource::class;
}
