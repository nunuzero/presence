<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Models\Staff;
use Filament\Actions;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Blade;
use App\Filament\Resources\StaffResource;
use Filament\Resources\Pages\ListRecords;

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
                    $staff = Staff::all();
                    $html = Blade::render('pdf.staff', [
                        'staff' => $staff,
                    ]);
                    
                    $pdfPath = storage_path("app/public/report/daftar_semua_karyawan.pdf");

                    $nodePath = trim(shell_exec('which node'));
                    $npmPath = trim(shell_exec('which npm'));

                    Browsershot::html($html)
                        ->setNodeBinary($nodePath)
                        ->setNpmBinary($npmPath)
                        ->format('A4')
                        ->margins(10, 10, 10, 10)
                        ->noSandbox()
                        ->savePdf($pdfPath);

                    return response()->download($pdfPath);
                }),
            Actions\CreateAction::make(),
        ];
    }
}
