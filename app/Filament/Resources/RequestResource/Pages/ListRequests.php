<?php

namespace App\Filament\Resources\RequestResource\Pages;

use App\Filament\Resources\RequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListRequests extends ListRecords
{
    protected static string $resource = RequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Waiting' => Tab::make()
                ->query(fn ($query) => $this->filterByRole($query, 'Waiting')),
    
            'Accepted' => Tab::make()
                ->query(fn ($query) => $this->filterByRole($query, 'Accepted')),
    
            'Rejected' => Tab::make()
                ->query(fn ($query) => $this->filterByRole($query, 'Rejected')),
        ];
    }

    private function filterByRole($query, $status)
    {
        if (auth()->user()->hasRole('super_admin')) {
            return $query->where('status', $status);
        }

        if (auth()->user()->hasRole('panel_user')) {
            return $query->where('status', $status)->where('user_id', auth()->user()->id);
        }

        return $query->where('status', $status);
    }
}
