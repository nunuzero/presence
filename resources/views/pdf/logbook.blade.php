<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Kegiatan Semua Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-6 font-sans">
    <h1 class="text-2xl font-bold text-center mb-8">{{ $name }}</h1>

    <div class="flex justify-center space-x-6 text-sm text-gray-700 mb-6">
        <span><strong>{{ $startDateLabel }}</strong> {{ $startDate }}</span>
        <span><strong>{{ $endDateLabel }}</strong> {{ $endDate }}</span>
    </div>

    @foreach ($logBook as $monthYear => $dates)
        <h2 class="text-xl font-bold mt-6">{{ $monthYear }}</h2>
        <table class="min-w-full mt-4 border border-collapse border-gray-500 text-xs">
            <thead>
                <tr>
                    <th class="px-4 py-2 border bg-gray-100 border-gray-500">No</th>
                    <th class="px-4 py-2 border bg-gray-100 border-gray-500">Nama</th>
                    <th class="px-4 py-2 border bg-gray-100 border-gray-500">Dibuat Pada</th>
                    <th class="px-4 py-2 border bg-gray-100 border-gray-500">Pekerjaan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($dates as $date => $users)
                    <tr>
                        <td colspan="4" class="text-center bg-gray-300 border-gray-500 font-bold text-lg">
                            {{ \Carbon\Carbon::parse($date)->translatedFormat('j F Y') }}
                        </td>
                    </tr>
                    @foreach ($users as $userLogs)
                        @foreach ($userLogs['logs'] as $log)
                            <tr>
                                <td class="px-4 py-2 border text-center border-gray-500">{{ $no++ }}</td>
                                <td class="px-4 py-2 border text-left border-gray-500">{{ $userLogs['user_name'] }}</td>
                                <td class="px-4 py-2 border text-center border-gray-500">
                                    {{ \Carbon\Carbon::parse($userLogs['created_at'])->format('H:i:s') }}
                                </td>
                                <td class="px-4 py-2 border text-left border-gray-500">{!! $log !!}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>

</html>
