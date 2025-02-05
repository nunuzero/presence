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
            return '
            <h1 class="text-2xl font-bold">Hari ini libur</h1>
            <p class="text-gray-400">Hari ini adalah libur nasional: ' . $holiday->name . '</p>
            <p class="text-gray-400">Selamat menikmati liburan Anda!</p>
            ';
        }

        $workTime = $this->getWorkTime();
        if (!$workTime || !$workTime->is_workday) {
            return '
            <h1 class="text-2xl font-bold">Hari ini bukan hari kerja</h1>
            <p class="text-gray-400">Mohon untuk kembali bekerja pada hari kerja berikutnya</p>
            ';
        }

        $presenceToday = Presence::where('user_id', Auth::id())
            ->whereDate('date', today())
            ->first();

        if ($presenceToday) {
            $presenceType = $presenceToday->presenceType->type;

            if ($presenceType !== 'WFO' && $presenceType !== 'Tidak Masuk') {
                return '
                    <h1 class="text-2xl font-bold">Anda tidak perlu melakukan absensi hari ini</h1>
                    <p class="text-gray-400">Anda sedang dalam status ' . $presenceType . ' hari ini</p>
                    ';
            }
        }

        $now = now();
        $startTime = now()->setTimeFromTimeString($workTime->start_time);
        $endTime = now()->setTimeFromTimeString($workTime->end_time);

        if ($workTime->time_limit !== null) {
            $attendanceEndTime = $startTime->copy()->addMinutes($workTime->time_limit);

            if ($now->greaterThan($attendanceEndTime) && !$this->hasAttendanceToday()) {
                return '
                <h1 class="text-2xl font-bold">Batas waktu absensi masuk telah berakhir</h1>
                <p class="text-gray-400">Batas waktu absesnsi masuk hari ini adalah ' . $workTime->time_limit . ' menit, mohon untuk absen pada waktu yang telah ditentukan</p>
                ';
            }
        }

        if ($now->lessThan($startTime)) {
            return '
            <h1 class="text-2xl font-bold">Menunggu jam masuk kerja</h1>
            <p class="text-gray-400">Absen akan dibuka pada jam ' . $startTime->format('H:i') . ', silakan kembali pada jam tersebut untuk melakukan absensi</p>
            ';
        }

        if ($now->greaterThan($endTime) && !$this->hasAttendanceToday()) {
            return '
            <h1 class="text-2xl font-bold">Anda tidak hadir hari ini</h1>
            <p class="text-gray-400">Mohon untuk absen pada waktu yang tepat</p>
            ';
        }

        if ($this->hasAttendanceToday() && $this->hasFilledLogBookToday() && $now->lessThan($endTime)) {
            return '
            <h1 class="text-2xl font-bold">Menunggu jam kerja selesai</h1>
            <p class="text-gray-400">Anda sudah melakukan absensi masuk dan mengisi logbook, silahkan tunggu hingga jam kerja selesai (' . $endTime->format('H:i') . ') untuk melakukan absensi pulang</p>
            ';
        }

        return null;
    }



    protected function getFormSchema(): array
    {
        return [
            Textarea::make('work')
                ->label(translate("Today's Work"))
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
