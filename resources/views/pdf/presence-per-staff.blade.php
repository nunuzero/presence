@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Per Karyawan</title>
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

    @foreach ($presences as $user)
        <div class="staff-section mb-8 @if (!$loop->first) page-break @endif">
            <div class="flex items-center space-x-4">
                <div class="staff-photo">
                    <img src="{{ $user['user']->profile_image ? Storage::url($user['user']->profile_image) : asset('img/avatar-placeholder.webp') }}"
                        alt="{{ $user['user']->name }}"
                        class="w-24 h-24 rounded-lg text-center border-2 border-gray-500">
                </div>
                <div class="staff-details">
                    <p><strong>Nama Karyawan:</strong> {{ $user['user_name'] }}</p>
                    <p><strong>Pendidikan Terakhir:</strong> {{ $user['user']->staff->education }}</p>
                    <p><strong>Jabatan:</strong> {{ $user['user']->staff->position->position }}</p>
                </div>
            </div>


            <div class="work-summary mt-6">
                <table class="w-full mt-2 border-collapse border border-gray-500 text-xs">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border border-gray-500">No</th>
                            <th class="px-4 py-2 border border-gray-500">Bulan dan Tahun</th>
                            <th class="px-4 py-2 border border-gray-500">WFO</th>
                            <th class="px-4 py-2 border border-gray-500">WFH</th>
                            <th class="px-4 py-2 border border-gray-500">Izin</th>
                            <th class="px-4 py-2 border border-gray-500">Sakit</th>
                            <th class="px-4 py-2 border border-gray-500">Cuti</th>
                            <th class="px-4 py-2 border border-gray-500">Tidak Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($user['user_summary'] as $month => $data)
                            <tr>
                                <td class="px-4 py-2 border border-gray-500 text-center">{{ $i++ }}</td>
                                <td class="px-4 py-2 border border-gray-500 text-center">{{ Carbon::parse($month)->translatedFormat('F Y') }}</td>
                                <td class="px-4 py-2 border border-gray-500 text-center">{{ $data['summary']['WFO'] }}
                                </td>
                                <td class="px-4 py-2 border border-gray-500 text-center">{{ $data['summary']['WFH'] }}
                                </td>
                                <td class="px-4 py-2 border border-gray-500 text-center">{{ $data['summary']['Izin'] }}
                                </td>
                                <td class="px-4 py-2 border border-gray-500 text-center">
                                    {{ $data['summary']['Sakit'] }}</td>
                                <td class="px-4 py-2 border border-gray-500 text-center">{{ $data['summary']['Cuti'] }}
                                </td>
                                <td class="px-4 py-2 border border-gray-500 text-center">
                                    {{ $data['summary']['Tidak Masuk'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</body>

</html>
