<?php

namespace App\Filament\Widgets;

use App\Models\Presence;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class QrScan extends Widget
{
    use HasWidgetShield;

    public static function canView(): bool
    {
        return auth()->user()->can('widget_QrScan');
    }

    protected static string $view = 'filament.widgets.qr-scan';

    protected int | string | array $columnSpan = 'full';
    
    public function hasAttendanceToday()
    {
        return Presence::where('user_id', Auth::id())
            ->whereDate('time', today())
            ->exists();
    }

    protected function getViewData(): array
    {
        return [
            'hasAttendance' => $this->hasAttendanceToday(),
        ];
    }
}