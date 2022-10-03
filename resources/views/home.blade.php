<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="20">

        <title>Apurações Eleições 2022</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="resources/css/reset.css" rel="stylesheet">
        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                font-weight: bold;
                font-size: 1.5em;
            }
            .information {
                text-align: center;
            }
            tr {
                text-align: center;
            }
            .candidates {
                display: flex !important;
                justify-content: center;
            }
            table, td, th {
                border: 1px solid #000;
                border-collapse: collapse;
            }
            th {
                padding: 1em;
                background-color: #EEEDE7;
            }
            td {
                padding: 0.5em;
            }
        </style>
    </head>
    <body>
        <div class="information">
            <h1>Apurações das Eleições 2022 - {{ $item['information']['date'] }} {{ $item['information']['hour'] }}</h1>
            <h2>Porcentagem de votos apurados:  {{ $item['information']['percentage_total'] }}%</h2>
        </div>
        <div class="candidates">
            <table>
                <thead>
                    <tr>
                        <th>Posição</th>
                        <th>Partido</th>
                        <th>Candidato</th>
                        <th>Quantidade Votos</th>
                        <th>Porcentagem</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($item['candidates'] as $key => $candidate)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $candidate['part_number'] }} - {{ $candidate['part_name'] }}</td>
                        <td>{{ $candidate['name'] }}</td>
                        <td>{{ number_format($candidate['votes_counted'], 0, '.', '.') }}</td>
                        <td>{{ $candidate['calculated_percentage'] }}%</td>
                    </tr>
                    @if($loop->last)
                        </tbody>
                    @endif
                @endforeach
            </table>
        </div>
    </body>
</html>
