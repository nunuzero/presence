<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Semua Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-8 bg-gray-100 text-gray-900">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg">
        <h1 class="text-2xl font-bold text-center mb-6">{{ $name }}</h1>

        <!-- Informasi From Date dan To Date -->
        <div class="flex justify-center space-x-6 text-sm text-gray-700 mb-6">
            <span><strong>{{ $startDateLabel }}</strong> {{ $startDate }}</span>
            <span><strong>{{ $endDateLabel }}</strong> {{ $endDate }}</span>
        </div>

        <!-- Keterangan -->
        <div class="mb-6 text-sm text-gray-700">
            <p class="font-semibold">Keterangan:</p>
            <ul class="list-disc list-inside text-gray-600">
                <li><strong>WFO</strong> = Work from office</li>
                <li><strong>WFH</strong> = Work from home</li>
                <li><strong>Izin</strong> = Tidak masuk karena izin</li>
                <li><strong>Sakit</strong> = Tidak masuk karena sakit</li>
                <li><strong>Cuti</strong> = Tidak masuk karena cuti</li>
            </ul>
        </div>

        @foreach ($presences as $month => $users)
            <h2 class="text-lg font-semibold mt-8">{{ $month }}</h2>
            <table class="w-full border-collapse border border-gray-300 text-sm mt-2">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-300 px-3 py-2" rowspan="2">No</th>
                        <th class="border border-gray-300 px-3 py-2" rowspan="2">Nama</th>
                        <th class="border border-gray-300 px-3 py-2" colspan="6">Presensi</th>
                    </tr>
                    <tr>
                        <th class="border border-gray-300 px-3 py-2">WFO</th>
                        <th class="border border-gray-300 px-3 py-2">WFH</th>
                        <th class="border border-gray-300 px-3 py-2">Izin</th>
                        <th class="border border-gray-300 px-3 py-2">Sakit</th>
                        <th class="border border-gray-300 px-3 py-2">Cuti</th>
                        <th class="border border-gray-300 px-3 py-2">Tidak Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($users as $userPresences)
                        <tr class="odd:bg-white even:bg-gray-100">
                            <td class="border border-gray-300 px-3 py-2 text-center">{{ $no++ }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $userPresences['user_name'] }}</td>
                            <td class="border border-gray-300 px-3 py-2 text-center">
                                {{ $userPresences['summary']['WFO'] }}</td>
                            <td class="border border-gray-300 px-3 py-2 text-center">
                                {{ $userPresences['summary']['WFH'] }}</td>
                            <td class="border border-gray-300 px-3 py-2 text-center">
                                {{ $userPresences['summary']['Izin'] }}</td>
                            <td class="border border-gray-300 px-3 py-2 text-center">
                                {{ $userPresences['summary']['Sakit'] }}</td>
                            <td class="border border-gray-300 px-3 py-2 text-center">
                                {{ $userPresences['summary']['Cuti'] }}</td>
                            <td class="border border-gray-300 px-3 py-2 text-center">
                                {{ $userPresences['summary']['Tidak Masuk'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
</body>

</html>
