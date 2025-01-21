<?php

namespace App\Filament\Resources\PresenceResource\Pages;

use Carbon\Carbon;
use Filament\Actions;
use App\Models\Presence;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms\Components\Split;
use Illuminate\Support\Facades\Blade;
use Filament\Resources\Components\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PresenceResource;
use Filament\Forms\Components\Actions\Action;

class ListPresences extends ListRecords
{
    protected static string $resource = PresenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('modal')
                ->label(translate('PDF Report'))
                ->icon('heroicon-o-document')
                ->modalSubmitActionLabel(translate('Create'))
                ->modalHeading('Generate PDF Report')
                ->modalWidth('lg')
                ->form([
                    TextInput::make('name')
                        ->label('Name')
                        ->localizeLabel()
                        ->required()
                        ->columnSpanFull(),
                    Split::make([
                        DatePicker::make('start_date')
                            ->label('From Date')
                            ->localizeLabel()
                            ->required()
                            ->format('d/m/Y')
                            ->native(false),
                        DatePicker::make('end_date')
                            ->label('To')
                            ->localizeLabel()
                            ->required()
                            ->format('d/m/Y')
                            ->native(false),
                    ]),
                ])
                ->action(function (array $data) {
                    $startDate = $data['start_date'];
                    $endDate = $data['end_date'];
                    $name = $data['name'];
                
                    $startDate = Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay()->toDateTimeString();
                    $endDate = Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay()->toDateTimeString();
                
                    $presences = Presence::whereBetween('time', [$startDate, $endDate])->get();
                
                    return response()->streamDownload(function () use ($presences) {
                        echo Pdf::loadHtml(
                            Blade::render('pdf', ['presences' => $presences])
                        )->stream();
                    }, $name . '.pdf');
                }),
        ];
    }


    public function getTabs(): array
    {
        return [
            null => Tab::make(translate('All')),
            'WFO' => Tab::make('WFO')->query(fn($query) => $query->whereHas('presenceType', fn($q) => $q->where('type', 'WFO'))),
            'WFH' => Tab::make('WFH')->query(fn($query) => $query->whereHas('presenceType', fn($q) => $q->where('type', 'WFH'))),
            'Izin' => Tab::make('Izin')->query(fn($query) => $query->whereHas('presenceType', fn($q) => $q->where('type', 'Izin'))),
            'Sakit' => Tab::make('Sakit')->query(fn($query) => $query->whereHas('presenceType', fn($q) => $q->where('type', 'Sakit'))),
            'Cuti' => Tab::make('Cuti')->query(fn($query) => $query->whereHas('presenceType', fn($q) => $q->where('type', 'Cuti'))),
        ];
    }
}
