<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Parameter Beispiel</title>
</head>
<body>
<p>Alle Kategorien der Gerichte der Datenbank lauten:
<ul>
    @foreach($kategorien as $index => $kategorie)
        @if($index % 2 == 1)
            <li><strong>{{ $kategorie['name']  }}</strong></li>
        @else
            <li>{{ $kategorie['name']  }}</li>
        @endif
    @endforeach
</ul>
</p>

<!-- http://localhost:8080/m4_7b_kategorie zeigt alles an, außer den Namen
-->
</body>
</html>