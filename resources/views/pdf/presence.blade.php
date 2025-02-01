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

        .date-range {
            font-size: 14px;
            color: #333;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .description {
            margin-bottom: 30px;
            font-size: 14px;
            color: #555;
            /* Warna teks agak pudar */
        }

        h2 {
            font-size: 18px;
            font-weight: bold;
            margin-top: 30px;
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
    </style>
</head>

<body>
    <h1>{{ $name }}</h1>

    <!-- Informasi From Date dan To Date -->
    <div class="date-range">
        <span><strong>{{ $startDateLabel }}</strong> {{ $startDate }}</span>
        <span><strong>{{ $endDateLabel }}</strong> {{ $endDate }}</span>
    </div>

    <!-- Keterangan -->
    <div class="description">
        <p><strong>Keterangan:</strong></p>
        <ul>
            <li>WFO = Work from office (Bekerja dari kantor)</li>
            <li>WFH = Work from home (Bekerja dari rumah)</li>
            <li>Izin = Tidak masuk karena izin</li>
            <li>Sakit = Tidak masuk karena sakit</li>
            <li>Cuti = Tidak masuk karena cuti</li>
        </ul>
    </div>

    @foreach ($presences as $month => $users)
        <h2>{{ $month }}</h2>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama</th>
                    <th colspan="6">Presensi</th>
                </tr>
                <tr>
                    <th>WFO</th>
                    <th>WFH</th>
                    <th>Izin</th>
                    <th>Sakit</th>
                    <th>Cuti</th>
                    <th>Tidak Masuk</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($users as $userPresences)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td class="text-left">{{ $userPresences['user_name'] }}</td>
                        <td>{{ $userPresences['summary']['WFO'] }}</td>
                        <td>{{ $userPresences['summary']['WFH'] }}</td>
                        <td>{{ $userPresences['summary']['Izin'] }}</td>
                        <td>{{ $userPresences['summary']['Sakit'] }}</td>
                        <td>{{ $userPresences['summary']['Cuti'] }}</td>
                        <td>{{ $userPresences['summary']['Tidak Masuk'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>

</html>
