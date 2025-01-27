<?php

namespace App\Filament\Widgets;

use App\Models\Staff;
use App\Models\Holiday;
use App\Models\LogBook;
use App\Models\Presence;
use Filament\Widgets\Widget;
use App\Models\Setting\WorkTime;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
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

    public function hasReturnTimeToday()
    {
        return Presence::where('user_id', Auth::id())
            ->whereDate('date', today())
            ->whereNotNull('return_time')
            ->exists();
    }

    public function getStaff()
    {
        return Staff::where('user_id', Auth::id())->first();
    }

    public function getWorkTime()
    {
        $currentDay = today()->format('l');
        return WorkTime::where('day', $currentDay)->first();
    }

    public function getHoliday()
    {
        return Holiday::whereDate('date', today())->first();
    }

    public function checkWorkdayConditions()
    {
        $holiday = $this->getHoliday();
        if ($holiday && $holiday->is_national_holiday) {
            return 'Hari ini adalah libur nasional: ' . $holiday->name;
        }

        $workTime = $this->getWorkTime();

        if (!$workTime || !$workTime->is_workday) {
            return 'Hari ini bukan hari kerja';
        }

        $now = now();
        $startTime = now()->setTimeFromTimeString($workTime->start_time);
        $endTime = now()->setTimeFromTimeString($workTime->end_time);

        if ($workTime->time_limit !== null) {
            $attendanceEndTime = $startTime->copy()->addMinutes($workTime->time_limit);

            if ($now->greaterThan($attendanceEndTime) && !$this->hasAttendanceToday()) {
                return 'Batas waktu absensi masuk telah berakhir';
            }
        }

        if ($now->lessThan($startTime)) {
            return 'Absen akan dibuka pada jam ' . $startTime->format('H:i');
        }

        if ($now->greaterThan($endTime) && !$this->hasAttendanceToday()) {
            return 'Anda tidak hadir hari ini';
        }

        if ($this->hasAttendanceToday() && $this->hasFilledLogBookToday() && $now->lessThan($endTime)) {
            return 'Anda sudah melakukan absensi masuk dan mengisi logbook. Silakan tunggu hingga jam kerja selesai ('.$workTime->end_time.') untuk melakukan absensi pulang';
        }

        return null;
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
        $conditionMessage = $this->checkWorkdayConditions();
        $hasAttendance = $this->hasAttendanceToday();
        $hasLogBook = $this->hasFilledLogBookToday();
        $hasReturnTime = $this->hasReturnTimeToday();
        $staff = $this->getStaff();

        return [
            'conditionMessage' => $conditionMessage,
            'hasAttendance' => $hasAttendance,
            'hasLogBook' => $hasLogBook,
            'hasReturnTime' => $hasReturnTime,
            'staff' => $staff,
        ];
    }
}
