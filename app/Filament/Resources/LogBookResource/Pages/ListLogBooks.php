<?php

namespace App\Filament\Resources\LogBookResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\LogBookResource;
use App\Models\LogBook;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Carbon as Carbon2;

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

                    $logBook = LogBook::whereBetween('date', [$startDateCarbon, $endDateCarbon])
                        ->orderBy('date')
                        ->get()
                        ->groupBy(function ($log) {
                            $month = Carbon2::parse($log->date)->format('F');
                            $year = Carbon2::parse($log->date)->format('Y');
                            return __(':month :year', ['month' => translate($month), 'year' => $year]);
                        })
                        ->map(function ($groupByMonth) {
                            return $groupByMonth->groupBy('user_id')->map(function ($userLogs) {
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

                    return response()->streamDownload(function () use ($name, $logBook, $formattedStartDate, $formattedEndDate) {
                        echo Pdf::loadHtml(
                            Blade::render('pdf.logbook', [
                                'logBook' => $logBook,
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
}
