<x-filament-widgets::widget wire:poll.20s>
    <x-filament::section>
        @php
            $qrCodePath = public_path('qr/temp/staff_' . $staff->id . '_qrcode.png');
        @endphp

        @if ($conditionMessage)
            <div class="flex flex-col items-center justify-center text-center space-y-4">
                {!! $conditionMessage !!}
            </div>
        @elseif (!file_exists($qrCodePath))
            <div class="flex flex-col items-center justify-center text-center space-y-4">
                <h1 class="text-2xl font-bold">Kode QR untuk anda belum tersedia</h1>
                <p>Silahkan tunggu beberapa saat untuk pembuatan Kode QR otomatis</p>
            </div>
        @elseif ($hasReturnTime)
            <div class="flex flex-col items-center justify-center text-center space-y-4">
                <h1 class="text-2xl font-bold">Terima Kasih atas kehadiran anda hari ini</h1>
            </div>
        @elseif (!$hasAttendance)
            <div class="flex flex-col items-center justify-center text-center space-y-4">
                <h1 class="text-2xl font-bold">Anda belum melakukan absensi kehadiran hari ini</h1>
                <p>Scan Kode QR dibawah dan masuk ke link yang diberikan untuk melakukan absensi kehadiran</p>
                <img class="mt-4" style="width: 200px; height: 200px;"
                    src="{{ asset('qr/temp/staff_' . $staff->id . '_qrcode.png') . '?' . now()->timestamp }}"
                    alt="QR Code for attendance">
            </div>
        @elseif(!$hasLogBook)
            <form wire:submit.prevent="handleSubmit">
                <h1 class="text-2xl font-bold">List Pekerjaan</h1>
                <p>Buat list perkejaan yang anda lakukan hari ini, barulah anda bisa melakukan absensi pulang</p>
                <br>
                {{ $this->form }}

                <div class="mt-4">
                    <x-filament::button type="submit">
                        Submit
                    </x-filament::button>
                </div>
            </form>
        @else
            <div class="flex flex-col items-center justify-center text-center space-y-4">
                <h1 class="text-2xl font-bold">Anda belum melakukan absensi pulang hari ini</h1>
                <p>Scan Kode QR dibawah dan masuk ke link yang diberikan untuk melakukan absensi pulang</p>
                <img class="mt-4" style="width: 200px; height: 200px;"
                    src="{{ asset('qr/temp/staff_' . $staff->id . '_qrcode.png') . '?' . now()->timestamp }}"
                    alt="QR Code for attendance">
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
