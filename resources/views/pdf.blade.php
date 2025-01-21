<html>
<body>
    <h1>All Records</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Other Columns</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presences as $presence)
                <tr>
                    <td>{{ $presence->user->name }}</td>
                    <td>{{ $presence->presenceType->type }}</td>
                    <td>{{ $presence->time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
