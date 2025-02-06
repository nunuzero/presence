<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-6 bg-gray-100 text-gray-800 text-sm">
    <h1 class="text-xl font-bold text-center mb-6">Daftar Semua Karyawan</h1>
    <br class="m-4">

    <table class="w-full border-collapse border border-gray-300 text-xs">
        <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 px-3 py-2">No</th>
                <th class="border border-gray-300 px-3 py-2">Nama</th>
                <th class="border border-gray-300 px-3 py-2">Waktu Mulai Bekerja</th>
                <th class="border border-gray-300 px-3 py-2">Pendidikan Terakhir</th>
                <th class="border border-gray-300 px-3 py-2">Jabatan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $categories = [
                    'Project Manager' => 'Project Manager',
                    'Programmer' => 'Programmer',
                    'UI/UX' => 'UI/UX',
                    'Support & Marketing' => 'Support & Marketing',
                    'Intern' => 'Intern',
                ];
                $no = 1;
            @endphp

            @foreach ($categories as $categoryKey => $categoryName)
                @php
                    $filteredStaff = $staff->filter(fn($st) => $st->position->category === $categoryKey);
                @endphp

                @if ($filteredStaff->isNotEmpty())
                    <tr class="bg-gray-100 text-sm">
                        <td colspan="5" class="text-center font-semibold px-3 py-2">{{ $categoryName }}</td>
                    </tr>

                    @foreach ($filteredStaff as $st)
                        <tr>
                            <td class="border border-gray-300 px-3 py-2 text-center">{{ $no++ }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $st->user->name }}</td>
                            <td class="border border-gray-300 px-3 py-2">
                                {{ \Carbon\Carbon::parse($st->start_date)->translatedFormat('j F Y') }}
                            </td>
                            <td class="border border-gray-300 px-3 py-2">{{ $st->education }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $st->position->position }}</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>
</body>

</html>
