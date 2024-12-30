<x-filament-widgets::widget>
    <x-filament::section>
        @if(!$hasAttendance)
            <div class="flex flex-col items-center justify-center text-center space-y-4">
                <h1 class="text-3xl font-bold">You haven't taken attendance today</h1>
                <p>Scan the qr code below and enter the link provided to take attendance</p>
                <img class="mt-4" style="width: 200px; height: 200px;" src="{{ asset('qr/qrcode.png') }}" alt="QR Code for attendance">
            </div>
        @else
            <div class="flex flex-col items-center justify-center text-center space-y-4">
                <h1 class="text-3xl font-bold">You have taken attendance today</h1>
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>