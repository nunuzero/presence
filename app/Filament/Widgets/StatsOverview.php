<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Staff;
use App\Models\LogBook;
use App\Models\Presence;
use Illuminate\Support\HtmlString;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    use HasWidgetShield;
    
    protected static ?string $pollingInterval = '20s';

    protected function getHeading(): ?string
    {
        return translate('Staff Presence');
    }

    protected function getStats(): array
    {
        $staff = Staff::get()->count();

        $todayArrived = Presence::whereDate('date', Carbon::today())
            ->whereHas('presenceType', function ($query) {
                $query->whereIn('type', ['WFO', 'WFH']);
            })
            ->count();
        $todayWfo = Presence::whereDate('date', Carbon::today())
            ->whereHas('presenceType', function ($query) {
                $query->where('type', 'WFO');
            })
            ->count();
        $todayWfh = Presence::whereDate('date', Carbon::today())
            ->whereHas('presenceType', function ($query) {
                $query->where('type', 'WFH');
            })
            ->count();

        $todayAbsent = Presence::whereDate('date', Carbon::today())
            ->whereHas('presenceType', function ($query) {
                $query->whereIn('type', ['Izin', 'Sakit', 'Cuti', 'Tidak Masuk']);
            })
            ->count();
        $todayIzin = Presence::whereDate('date', Carbon::today())
            ->whereHas('presenceType', function ($query) {
                $query->where('type', 'Izin');
            })
            ->count();
        $todaySakit = Presence::whereDate('date', Carbon::today())
            ->whereHas('presenceType', function ($query) {
                $query->where('type', 'Sakit');
            })
            ->count();
        $todayCuti = Presence::whereDate('date', Carbon::today())
            ->whereHas('presenceType', function ($query) {
                $query->where('type', 'Cuti');
            })
            ->count();
        $todayTidakMasuk = Presence::whereDate('date', Carbon::today())
            ->whereHas('presenceType', function ($query) {
                $query->where('type', 'Tidak Masuk');
            })
            ->count();

        $todayLogBook = LogBook::whereDate('date', Carbon::today())->count();


        return [
            Stat::make('staff', $staff)
                ->label(translate('Staff'))
                ->description(translate('Total staff'))
                ->descriptionIcon('heroicon-o-users', IconPosition::Before)
                ->color('sky'),
            Stat::make('arrived', $todayArrived)
                ->label(translate("Today's presence"))
                ->description(new HtmlString(nl2br("WFO: {$todayWfo}\nWFH: {$todayWfh}")))
                ->descriptionIcon('heroicon-o-clipboard-document-check', IconPosition::Before)
                ->color('success'),
            Stat::make('logbook', $todayLogBook)
                ->label(translate('Logbook'))
                ->description(translate('Logbook filled out today'))
                ->descriptionIcon('heroicon-o-book-open', IconPosition::Before)
                ->color('violet'),
            Stat::make('absent', $todayAbsent)
                ->label(translate("Today's absent"))
                ->description(new HtmlString(nl2br("Izin: {$todayIzin}\nSakit: {$todaySakit}\nCuti: {$todayCuti}\nTidak masuk: {$todayTidakMasuk}")))
                ->descriptionIcon('heroicon-o-exclamation-triangle', IconPosition::Before)
                ->color('danger'),
        ];
    }
}
