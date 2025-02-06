<?php

namespace App\Filament\Resources\PresenceResource\Pages;

use Carbon\Carbon;
use App\Models\User;
use Filament\Actions;
use App\Models\Presence;
use Filament\Actions\Action;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Browsershot\Browsershot;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Blade;
use Filament\Resources\Components\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Carbon as Carbon2;
use App\Filament\Resources\PresenceResource;

class ListPresences extends ListRecords
{
    protected static string $resource = PresenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('report')
                ->label(translate('PDF Report'))
                ->icon('heroicon-o-document')
                ->modalSubmitActionLabel(translate('Create'))
                ->modalHeading(translate('Generate PDF Report'))
                ->modalWidth('lg')
                ->form([
                    TextInput::make('name')
                        ->label('Name')
                        ->localizeLabel()
                        ->default('tes')
                        ->required()
                        ->columnSpanFull(),
                    Select::make('type')
                        ->label(translate('Type'))
                        ->options([
                            'All Staff' => translate('All Staff'),
                            'Per Staff' => translate('Per Staff'),
                        ])
                        ->native(false)
                        ->default('Per Staff')
                        ->required(),
                    Split::make([
                        DatePicker::make('start_date')
                            ->label('From Date')
                            ->localizeLabel()
                            ->default('2024-10-1')
                            ->required()
                            ->format('d/m/Y')
                            ->native(false),
                        DatePicker::make('end_date')
                            ->label('To')
                            ->localizeLabel()
                            ->default('2024-12-31')
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

                    if ($data['type'] != 'All Staff') {
                        $presences = Presence::with(['user', 'presenceType'])
                            ->whereBetween('date', [$startDateCarbon->toDateTimeString(), $endDateCarbon->toDateTimeString()])
                            ->get()
                            ->groupBy('user_id')
                            ->map(function ($userPresences) {
                                $types = ['WFO', 'WFH', 'Izin', 'Sakit', 'Cuti', 'Tidak Masuk'];
                                $userSummary = [];

                                $groupByMonth = $userPresences->groupBy(function ($presence) {
                                    return Carbon::parse($presence->date)->format('F Y');
                                });

                                foreach ($groupByMonth as $month => $presences) {
                                    $summary = array_fill_keys($types, 0);

                                    foreach ($presences as $presence) {
                                        $type = $presence->presenceType->type ?? 'Tidak Masuk';
                                        $summary[$type]++;
                                    }

                                    $userSummary[$month] = [
                                        'summary' => $summary,
                                        'presences' => $presences
                                    ];
                                }

                                return [
                                    'user_name' => $userPresences->first()->user->name ?? 'Unknown',
                                    'user' => $userPresences->first()->user,
                                    'user_summary' => $userSummary
                                ];
                            });


                        $html = Blade::render('pdf.presence-per-staff', [
                            'presences' => $presences,
                            'name' => $name,
                            'startDate' => $formattedStartDate,
                            'endDate' => $formattedEndDate,
                            'startDateLabel' => translate('From Date:'),
                            'endDateLabel' => translate('To:'),
                        ]);
                    } else {
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

                        $html = Blade::render('pdf.presence', [
                            'presences' => $presences,
                            'name' => $name,
                            'startDate' => $formattedStartDate,
                            'endDate' => $formattedEndDate,
                            'startDateLabel' => translate('From Date:'),
                            'endDateLabel' => translate('To:'),
                        ]);
                    }

                    $pdfPath = storage_path('app/public/report/' . $name . '.pdf');

                    $nodePath = trim(shell_exec('which node'));
                    $npmPath = trim(shell_exec('which npm'));

                    Browsershot::html($html)
                        ->setNodeBinary($nodePath)
                        ->setNpmBinary($npmPath)
                        ->margins(10, 10, 10, 10)
                        ->format('A4')
                        ->noSandbox()
                        ->savePdf($pdfPath);


                    return response()->download($pdfPath);
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
