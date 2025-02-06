@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Kegiatan Per Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body class="p-6 font-sans">
    <h1 class="text-2xl font-bold text-center mb-8">{{ $name }}</h1>

    <div class="flex justify-center space-x-6 text-sm text-gray-700 mb-6">
        <span><strong>{{ $startDateLabel }}</strong> {{ $startDate }}</span>
        <span><strong>{{ $endDateLabel }}</strong> {{ $endDate }}</span>
    </div>

    @foreach ($logBook as $userLog)
        <div class="staff-section mb-8 @if (!$loop->first) page-break @endif">
            <div class="flex items-center space-x-4">
                <div class="staff-photo">
                    <img src="{{ $userLog['user']->profile_image ? Storage::url($userLog['user']->profile_image) : asset('img/avatar-placeholder.webp') }}"
                        alt="{{ $userLog['user']->name }}"
                        class="w-24 h-24 rounded-lg text-center border-2 border-gray-500">

                </div>
                <div class="staff-details">
                    <p><strong>{{ translate('Nama Karyawan:') }}</strong> {{ $userLog['user']->name }}</p>
                    <p><strong>{{ translate('Pendidikan Terakhir:') }}</strong>
                        {{ $userLog['user']->staff->education }}</p>
                    <p><strong>{{ translate('Jabatan:') }}</strong> {{ $userLog['user']->staff->position->position }}
                    </p>
                </div>
            </div>

            @php
                $groupedByMonth = collect($userLog['work_summary'])->groupBy(function ($log) {
                    return Carbon::parse($log['date'])->translatedFormat('F Y');
                });
            @endphp

            @foreach ($groupedByMonth as $month => $logs)
                <div class="work-entry mt-4">
                    <h3 class="text-lg font-semibold">{{ $month }}</h3>
                    <table class="w-full mt-2 border-collapse border border-gray-500 text-xs">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border border-gray-500">{{ translate('No') }}</th>
                                <th class="px-4 py-2 border border-gray-500">{{ translate('Tanggal') }}</th>
                                <th class="px-4 py-2 border border-gray-500">{{ translate('Dibuat Pada') }}</th>
                                <th class="px-4 py-2 border border-gray-500">{{ translate('Pekerjaan') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $index => $log)
                                <tr>
                                    <td class="px-4 py-2 border border-gray-500 text-center">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 border border-gray-500 text-center">
                                        {{ Carbon::parse($log['date'])->translatedFormat('j F Y') }}</td>
                                    <td class="px-4 py-2 border border-gray-500 text-center">
                                        {{ Carbon::parse($log['created_at'])->format('H:i:s') }}</td>
                                    <td class="px-4 py-2 border border-gray-500">{!! $log['work'] !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    @endforeach
</body>

</html>
