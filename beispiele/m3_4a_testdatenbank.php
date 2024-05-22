
<!DOCTYPE html>
<!--
- Praktikum DBWT. Autoren:
- Amelie Petersen, 3650167
- Nele Mikkelsen, 3661323
-->
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Testdatenbank</title>
</head>
<body>
<?php
$servername = "localhost"; // Host der Datenbank
$username = "root"; // Benutzername zur Anmeldung
$password = "Swammy2504"; // Passwort
$database = "emensawerbeseite"; // Datenbankname

$link = mysqli_connect($servername, $username, $password, $database
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
?>

<table>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>', '<td>', 'Gericht: ', '</td>', '<td>', $row['name'], '</td>', '</tr>';
    }
    ?>
</table>

<?php
mysqli_free_result($result);
mysqli_close($link);
?>

</body>
</html>