<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Resources\StaffResource;
use App\Models\Staff;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Spatie\Browsershot\Browsershot;

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
                    $html = view("pdf.staff", compact("staff"))->render();
                    $pdfPath = storage_path("app/public/report/daftar_semua_karyawan.pdf");

                    $nodePath = trim(shell_exec('which node'));
                    $npmPath = trim(shell_exec('which npm'));

                    Browsershot::html($html)
                        ->setNodeBinary($nodePath)
                        ->setNpmBinary($npmPath)
                        ->format('A4')
                        ->margins(10, 10, 10, 10)
                        ->noSandbox()
                        ->save($pdfPath);

                    return response()->download($pdfPath);
                }),
            Actions\CreateAction::make(),
        ];
    }
}
