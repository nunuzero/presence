<?php

namespace App\Filament\Resources\RequestResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\RequestResource;
use App\Helper\RedirectToListPage;

class CreateRequest extends CreateRecord
{
    use RedirectToListPage;
    
    protected static string $resource = RequestResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
        $data['status'] = 'Waiting';

        return $data;
    }
}
