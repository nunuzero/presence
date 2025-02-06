<?php

namespace App\Filament\Resources\LogBookResource\Pages;

use Carbon\Carbon;
use Filament\Actions;
use App\Models\LogBook;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Browsershot\Browsershot;
use Filament\Forms\Components\Split;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Carbon as Carbon2;
use App\Filament\Resources\LogBookResource;
use Filament\Forms\Components\Select;

class ListLogBooks extends ListRecords
{
    protected static string $resource = LogBookResource::class;

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
                            ->default('2024-12-1')
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
                        $logBook = LogBook::whereBetween('date', [$startDateCarbon, $endDateCarbon])
                            ->orderBy('date')
                            ->get()
                            ->groupBy('user_id')
                            ->map(function ($userLogs) {
                                $user = $userLogs->first()->user;
                                $workSummary = [];

                                $groupedByMonth = $userLogs->groupBy(function ($log) {
                                    return Carbon::parse($log->date)->format('F Y');
                                });

                                foreach ($groupedByMonth as $month => $logs) {
                                    foreach ($logs as $log) {
                                        $workSummary[] = [
                                            'date' => Carbon::parse($log->date)->format('j F Y'),
                                            'created_at' => Carbon::parse($log->created_at)->format('H:i:s'),
                                            'work' => nl2br(e($log->work)),
                                        ];
                                    }
                                }

                                return [
                                    'user' => $user,
                                    'work_summary' => $workSummary,
                                ];
                            });

                        $html = Blade::render('pdf.logbook-per-staff', [
                            'logBook' => $logBook,
                            'name' => $name,
                            'startDate' => $formattedStartDate,
                            'endDate' => $formattedEndDate,
                            'startDateLabel' => translate('From Date:'),
                            'endDateLabel' => translate('To:'),
                        ]);
                    } else {
                        $logBook = LogBook::whereBetween('date', [$startDateCarbon, $endDateCarbon])
                            ->orderBy('date')
                            ->get()
                            ->groupBy(function ($log) {
                                $monthYear = Carbon::parse($log->date)->format('F Y');
                                $monthTranslated = translate(Carbon::parse($log->date)->format('F'));
                                return $monthTranslated . ' ' . Carbon::parse($log->date)->year;
                            })
                            ->map(function ($monthLogs) {
                                return $monthLogs->groupBy('date')->map(function ($dateLogs) {
                                    return $dateLogs->groupBy('user_id')->map(function ($userLogs) {
                                        $workSummary = [];
                                        $createdAt = $userLogs->first()->created_at;

                                        foreach ($userLogs as $log) {
                                            $workSummary[] = nl2br(e($log->work));
                                        }

                                        return [
                                            'user_name' => $userLogs->first()->user->name ?? 'Unknown',
                                            'logs' => $workSummary,
                                            'created_at' => $createdAt,
                                        ];
                                    });
                                });
                            });

                        $html = Blade::render('pdf.logbook', [
                            'logBook' => $logBook,
                            'name' => $name,
                            'startDate' => $formattedStartDate,
                            'endDate' => $formattedEndDate,
                            'startDateLabel' => translate('From Date:'),
                            'endDateLabel' => translate('To:'),
                        ]);
                    }

                    $pdfPath = storage_path('app/public/' . $name . '.pdf');

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
}
