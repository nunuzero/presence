<?php

namespace App\Filament\Widgets;

use App\Models\Staff;
use App\Models\LogBook;
use App\Models\Presence;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class QrScan extends Widget implements HasForms
{
    use HasWidgetShield, InteractsWithForms;

    public $work;

    public static function canView(): bool
    {
        return auth()->user()->can('widget_QrScan');
    }

    protected static string $view = 'filament.widgets.qr-scan';

    public function hasAttendanceToday()
    {
        return Presence::where('user_id', Auth::id())
            ->whereDate('date', today())
            ->exists();
    }

    public function hasFilledLogBookToday()
    {
        return LogBook::where('user_id', Auth::id())
            ->whereDate('created_at', today())
            ->exists();
    }

    public function getStaff()
    {
        return Staff::where('user_id', Auth::id())->first();
    }

    protected function getFormSchema(): array
    {
        return [
            Textarea::make('work')
                ->label("Today's Work")
                ->placeholder("- work 1\n- work 2\n- work 3")
                ->rows(6)
                ->required(),
        ];
    }

    public function handleSubmit(): void
    {
        $data = $this->form->getState();

        LogBook::create([
            'user_id' => Auth::id(),
            'date' => now()->toDateString(),
            'work' => $data['work'],
        ]);

        $this->form->fill(['work' => null]);

        Notification::make()
            ->title('Success')
            ->body('LogBook entry created successfully!')
            ->success()
            ->send();
    }

    protected function getViewData(): array
    {
        $hasAttendance = $this->hasAttendanceToday();
        $hasLogBook = $this->hasFilledLogBookToday();
        $staff = $this->getStaff();

        return [
            'hasAttendance' => $hasAttendance,
            'hasLogBook' => $hasLogBook,
            'staff' => $staff,
        ];
    }
}
