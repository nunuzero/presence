<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Resources\StaffResource;
use App\Models\Staff;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;

class ListStaff extends ListRecords
{
    protected static string $resource = StaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('report')
                ->label(translate('PDF Report'))
                ->icon('heroicon-o-document')
                ->action(function (array $data) {
                    $staff = Staff::get();
                    return response()->streamDownload(function () use ($staff) {
                        echo Pdf::loadHtml(
                            Blade::render('pdf.staff', [
                                'staff' => $staff,
                            ])
                        )->stream();
                    }, translate('List All Staff') . '.pdf');
                }),
            Actions\CreateAction::make(),
        ];
    }
}
