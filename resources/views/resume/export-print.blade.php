<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #111827;
            margin: 24px;
        }

        h1 {
            margin: 0;
            font-size: 18px;
        }

        .meta {
            margin-top: 4px;
            margin-bottom: 16px;
            color: #4b5563;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #d1d5db;
            padding: 6px 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #f3f4f6;
            font-weight: 700;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                margin: 10mm;
            }
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <div class="meta">Dicetak pada: {{ $printedAt }}</div>

    <table>
        <thead>
            <tr>
                @foreach($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse($rows as $row)
                <tr>
                    @foreach($row as $cell)
                        <td>{{ $cell }}</td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) }}">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script>
        window.addEventListener('load', function() {
            window.print();
        });
    </script>
</body>
</html>
