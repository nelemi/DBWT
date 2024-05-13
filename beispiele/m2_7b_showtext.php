<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Übersetzung suchen</title>
</head>
<body>
<h2>Gewünschte Übersetzung: </h2>
<form method="GET">
    Suchwort: <input type="text" name="suche">
    <input type="submit" value="Suchen">
</form>
</body>
</html>


<?php

$textdatei = fopen('./en.txt', 'r');
const GET_SUCHWORT = 'suche';

if (!empty($_GET[GET_SUCHWORT])) {
    $suchwort = $_GET[GET_SUCHWORT];
}
if (!$textdatei) {
    die('Öffnen fehlgeschlagen');
}

$uebersetzung_gefunden = false;

while (!feof($textdatei)) {
    $zeile = fgets($textdatei);
    $woerter = explode(";", $zeile);
    if ($woerter[0] === $suchwort) {
        $uebersetzung = isset($woerter[1]) ? $woerter[1] : '';
        echo "Die Übersetzung von $suchwort ist $uebersetzung.";
        $uebersetzung_gefunden = true;
        break;
        }
}
fclose($textdatei);

if ($uebersetzung_gefunden === false) {
    echo "Übersetzung für '$suchwort' ist fehlgeschlagen.";
}
?>

