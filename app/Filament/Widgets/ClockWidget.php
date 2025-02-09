<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class ClockWidget extends Widget
{
    protected static string $view = 'filament.widgets.clock-widget';
    
    protected static ?string $pollingInterval = '20s';

    public function getColumnSpan(): string
    {
        // Cek apakah pengguna memiliki peran 'super_admin'
        if (auth()->user()?->hasRole('super_admin')) {
            return 'full';
        }

        // Kembalikan ukuran kolom default jika bukan super_admin
        return '1';
    }
}
