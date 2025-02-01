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

        .category-header {
            background-color: #ddd;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>{{ $name }}</h1>

    <div class="date-range">
        <span><strong>{{ $startDateLabel }}</strong> {{ $startDate }}</span>
        <span><strong>{{ $endDateLabel }}</strong> {{ $endDate }}</span>
    </div>

    @foreach ($logBook as $monthYear => $users)
        <h2>{{ $monthYear }}</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Dibuat Pada</th>
                    <th>Work</th>
                </tr>
            </thead>
            <tbody>
                @php $lastDate = ''; @endphp
                @foreach ($users as $userPresences)
                    @foreach ($userPresences['logs'] as $log)
                        @php
                            $logDate = \Carbon\Carbon::parse($userPresences['created_at'])->format('Y-m-d');
                        @endphp

                        @if ($logDate !== $lastDate)
                            <tr>
                                <td colspan="4" class="category-header">
                                    {{ \Carbon\Carbon::parse($logDate)->translatedFormat('l, j F Y') }}</td>
                            </tr>
                            @php
                                $lastDate = $logDate;
                                $no = 1;
                            @endphp
                        @endif

                        <tr>
                            <td>{{ $no++ }}</td>
                            <td class="text-left">{{ $userPresences['user_name'] }}</td>
                            <td class="text-left">
                                {{ \Carbon\Carbon::parse($userPresences['created_at'])->format('H:i:s') }}</td>
                            <td class="text-left">{!! $log !!}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>

</html>
