<?php

namespace App\Filament\Resources\PresenceResource\Pages;

use Carbon\Carbon;
use Illuminate\Support\Carbon as Carbon2;
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
            Actions\Action::make('report')
                ->label(translate('PDF Report'))
                ->icon('heroicon-o-document')
                ->modalSubmitActionLabel(translate('Create'))
                ->modalHeading(translate('Generate PDF Report'))
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
                    $name = $data['name'];
                    $startDate = $data['start_date'];
                    $endDate = $data['end_date'];

                    $startDateCarbon = Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay();
                    $endDateCarbon = Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay();

                    $formattedStartDate = $startDateCarbon->day . ' ' . translate($startDateCarbon->format('F')) . ' ' . $startDateCarbon->year;
                    $formattedEndDate = $endDateCarbon->day . ' ' . translate($endDateCarbon->format('F')) . ' ' . $endDateCarbon->year;

                    $presences = Presence::with(['user', 'presenceType'])
                        ->whereBetween('date', [$startDateCarbon->toDateTimeString(), $endDateCarbon->toDateTimeString()])
                        ->get()
                        ->groupBy(function ($presence) {
                            $month = Carbon2::parse($presence->date)->format('F');
                            $year = Carbon2::parse($presence->date)->format('Y');
                            return __(':month :year', ['month' => translate($month), 'year' => $year]);
                        })
                        ->map(function ($groupByMonth) {
                            return $groupByMonth->groupBy('user_id')->map(function ($userPresences) {
                                $types = ['WFO', 'WFH', 'Izin', 'Sakit', 'Cuti', 'Tidak Masuk'];
                                $summary = array_fill_keys($types, 0);

                                foreach ($userPresences as $presence) {
                                    $type = $presence->presenceType->type ?? 'Tidak Masuk';
                                    $summary[$type]++;
                                }

                                return [
                                    'user_name' => $userPresences->first()->user->name ?? 'Unknown',
                                    'summary' => $summary,
                                ];
                            });
                        });

                    return response()->streamDownload(function () use ($name, $presences, $formattedStartDate, $formattedEndDate) {
                        echo Pdf::loadHtml(
                            Blade::render('pdf.presence', [
                                'presences' => $presences,
                                'name' => $name,
                                'startDate' => $formattedStartDate,
                                'endDate' => $formattedEndDate,
                                'startDateLabel' => translate('From Date:'),
                                'endDateLabel' => translate('To:'),
                            ])
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
            'Tidak Masuk' => Tab::make('Tidak Masuk')->query(fn($query) => $query->whereHas('presenceType', fn($q) => $q->where('type', 'Tidak Masuk'))),
        ];
    }
}
