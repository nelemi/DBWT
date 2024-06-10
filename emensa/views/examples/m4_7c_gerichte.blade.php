<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Parameter Beispiel</title>
</head>
<body>
<p>
    @foreach($rows as $row)
        <p>{{$row['name']}}, {{$row['preisintern']}}</p>
    @endforeach

</p>

</body>
</html>