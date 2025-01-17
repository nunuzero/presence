<?php

namespace App\Filament\Resources\PresenceResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PresenceResource;

class ListPresences extends ListRecords
{
    protected static string $resource = PresenceResource::class;

    public function getTabs(): array
    {
        return [
            null => Tab::make(translate('All')),
            'WFO' => Tab::make('WFO')->query(fn($query) => $query->whereHas('presenceType', fn($q) => $q->where('type', 'WFO'))),
            'WFH' => Tab::make('WFH')->query(fn($query) => $query->whereHas('presenceType', fn($q) => $q->where('type', 'WFH'))),
            'Cuti' => Tab::make('Cuti')->query(fn($query) => $query->whereHas('presenceType', fn($q) => $q->where('type', 'Cuti'))),
            'Izin' => Tab::make('Izin')->query(fn($query) => $query->whereHas('presenceType', fn($q) => $q->where('type', 'Izin'))),
            'Sakit' => Tab::make('Sakit')->query(fn($query) => $query->whereHas('presenceType', fn($q) => $q->where('type', 'Sakit'))),
            'Tidak Masuk' => Tab::make('Tidak Masuk')->query(fn($query) => $query->whereHas('presenceType', fn($q) => $q->where('type', 'Tidak Masuk'))),
        ];
    }
}
