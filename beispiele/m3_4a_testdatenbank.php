<?php
$servername = "localhost"; // Host der Datenbank
$username = "root"; // Benutzername zur Anmeldung
$password = "Datenbankpasswort"; // Passwort
$database = "emensawerbeseite"; // Datenbankname

$link=mysqli_connect($servername, $username, $password, $database
);

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}

$sql = "SELECT name FROM gericht WHERE name LIKE 'K%'";

$result = mysqli_query($link, $sql);
if (!$result) {
    echo "Fehler während der Abfrage:  ", mysqli_error($link);
    exit();
}

while ($row = mysqli_fetch_assoc($result)) {
    echo '<li>', $row['name'], '</li>';
}

mysqli_free_result($result);
mysqli_close($link);