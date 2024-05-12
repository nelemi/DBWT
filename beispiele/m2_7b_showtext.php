<?php

$textdatei = 'en.txt';
$suchwort = $_GET['suche'];

if (!empty($suchwort)) {
    $suchwort = "Horse";
}

$datei_inhalt = file_get_contents($textdatei);
if (strpos($datei_inhalt, $suchwort) !== false) {
    echo "Das gesuchte Wort '$suchwort' wurde gefunden.";
} else {
    echo "Das gesuchte Wort '$suchwort' wurde nicht gefunden.";
}
