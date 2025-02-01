<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Presence;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview2 extends BaseWidget
{
    use HasWidgetShield;

    protected static ?string $pollingInterval = '20s';

    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        $today = Carbon::today();

        $earliest = Presence::whereDate('date', $today)
            ->whereNotNull('time_arrived')
            ->orderBy('time_arrived', 'asc')
            ->first();

        $last = Presence::whereDate('date', $today)
            ->whereNotNull('time_arrived')
            ->orderBy('time_arrived', 'desc')
            ->first();

        $earliestStaff = $earliest ? $earliest->user->name : translate('None yet');
        $lastStaff = $last ? $last->user->name : translate('None yet');

        $earliestTime = $earliest ? $earliest->time_arrived : '-';
        $lastTime = $last ? $last->time_arrived : '-';
        return [
            Stat::make('earliest', $earliestStaff)
                ->label(translate('Earliest arriving staff'))
                ->description(translate('Arrived at: ') . $earliestTime)
                ->descriptionIcon('heroicon-o-face-smile', IconPosition::Before)
                ->color('success'),
            Stat::make('last', $lastStaff)
                ->label(translate('Last arriving staff'))
                ->description(translate('Arrived at: ') . $lastTime)
                ->descriptionIcon('heroicon-o-face-frown', IconPosition::Before)
                ->color('danger'),
        ];
    }
}
