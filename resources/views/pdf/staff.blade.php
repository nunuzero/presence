<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        table th {
            font-weight: bold;
            background-color: #f4f4f4;
        }

        table td {
            vertical-align: middle;
        }

        table td.text-left {
            text-align: left;
        }

        .category-header {
            background-color: #ddd;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Daftar Semua Karyawan</h1>

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

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Waktu Mulai Bekerja</th>
                <th>Pendidikan Terakhir</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categoryKey => $categoryName)
                @php
                    $filteredStaff = $staff->filter(fn($st) => $st->position->category === $categoryKey);
                @endphp

                @if ($filteredStaff->isNotEmpty())
                    <tr>
                        <td colspan="5" class="category-header">{{ $categoryName }}</td>
                    </tr>

                    @foreach ($filteredStaff as $st)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $st->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($st->start_date)->translatedFormat('j F Y') }}</td>
                            <td>{{ $st->education }}</td>
                            <td>{{ $st->position->position }}</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>
</body>

</html>
