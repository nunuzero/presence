<x-filament-widgets::widget>
    <x-filament::section>
        @php
            $qrCodePath = public_path('qr/temp/staff_' . $staff->id . '_qrcode.png');
        @endphp

        @if (!file_exists($qrCodePath))
            <div class="flex flex-col items-center justify-center text-center space-y-4">
                <h1 class="text-3xl font-bold">QR Code Not Available</h1>
                <p>The QR code for this staff member is not generated yet. Please contact the administrator.</p>
            </div>
        @elseif ($hasAttendance && $hasLogBook)
            <div class="flex flex-col items-center justify-center text-center space-y-4">
                <h1 class="text-3xl font-bold">Done for today</h1>
            </div>
        @elseif (!$hasAttendance)
            <div class="flex flex-col items-center justify-center text-center space-y-4">
                <h1 class="text-3xl font-bold">You haven't taken attendance today</h1>
                <p>Scan the QR code below and enter the link provided to take attendance</p>
                <img class="mt-4" style="width: 200px; height: 200px;"
                    src="{{ asset('qr/temp/staff_' . $staff->id . '_qrcode.png') }}" alt="QR Code for attendance">
            </div>
        @elseif(!$hasLogBook)
            <form wire:submit.prevent="handleSubmit">
                {{ $this->form }}

                <div class="mt-4">
                    <x-filament::button type="submit">
                        Submit
                    </x-filament::button>
                </div>
            </form>
        @else
            <div class="flex flex-col items-center justify-center text-center space-y-4">
                <h1 class="text-3xl font-bold">You have completed attendance and logbook today</h1>
                <p>Scan the QR code below if you need to redo attendance</p>
                <img class="mt-4" style="width: 200px; height: 200px;"
                    src="{{ asset('qr/temp/staff_' . $staff->id . '_qrcode.png') }}" alt="QR Code for attendance">
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
