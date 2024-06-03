<?php
/**
 * Praktikum DBWT. Autoren:
 * Amelie, Petersen, 3661323
 * Nele, Mikkelsen, 3650167
 */
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>wunschgericht</title>
</head>
<body>
<form action="wunschgericht.php" method="post">
    <?php
    $servername = "localhost"; // Host der Datenbank
    $username = "root"; // Benutzername zur Anmeldung
    $password = "webtech#12"; // Passwort a: "Swammy2504", n:"webtech#12"
    $database = "emensawerbeseite"; // Datenbankname

    $link = mysqli_connect($servername, $username, $password, $database
    );
    if (!$link) {
        echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
        exit();
    }
    else {
        $name = "";
        $email = "";
        $gericht_name = "";
        $beschreibung = "";
      if (isset($_POST['submit'])){
          $name = isset($_POST['name']) && !empty($_POST['name']) ? $_POST['name'] : 'anonym';
          $email = isset($_POST['email']) ? $_POST['email'] : '';
          $gericht_name = isset($_POST['gericht_name']) ? $_POST['gericht_name'] : '';
          $beschreibung = isset($_POST['beschreibung']) ? $_POST['beschreibung'] : '';

          $sql_ersteller = "SELECT eid FROM erstellerin WHERE name = '$name' AND mail = '$email'"; # Lösung ChatBot, vorher kamen Fehler auf, dass die Eingabe mehrere Rows hat
          $ersteller_result = mysqli_query($link, $sql_ersteller);

          if (mysqli_num_rows($ersteller_result) == 0) {
              // Ersteller einfügen
              $insert_ersteller = "INSERT INTO erstellerin (name, mail) VALUES ('$name', '$email')";
              mysqli_query($link, $insert_ersteller);

              // Ersteller-ID abrufen
              $ersteller_id = mysqli_insert_id($link);
          } else {
              // Bestehende Ersteller-ID abrufen
              $ersteller_row = mysqli_fetch_assoc($ersteller_result);
              $ersteller_id = $ersteller_row['eid'];
          }
          $sql_wunschgericht = "INSERT INTO wunschgericht (name, beschreibung, erstellungsdatum, erstellerinid) VALUES ('$gericht_name', '$beschreibung', NOW(), $ersteller_id)";
          if (mysqli_query($link, $sql_wunschgericht)) {
            echo "Wunschgericht erfolgreich eingetragen!";
        }
          else {
            echo "Fehler während der Abfrage: ", mysqli_error($link);
        }
    }}
    ?>
    <div class="forms">
        <div>
            <label for="name">Ihr Name:</label>
            <br>
            <input type=text id="name" name="name" value="name">
        </div>
        <div>
            <label for="email">Ihre E-Mail:</label>
            <br>
            <input type=text id="email" name="email" value="">
        </div>
        <div>
            <label for="gericht_name">Name des Gerichts</label>
            <br>
            <input type=text id="gericht_name" name="gericht_name" value="Name">
        </div>
        <div>
            <label for="beschreibung">Kurze Beschreibung des Gerichts</label>
            <br>
            <input type=text id="beschreibung" name="beschreibung" value="Beschreibung">
        </div>
    </div>
    <br>
    <input id="abschicken" type="submit" name="submit" value="Wunsch abschicken">
</form>
</body>
</html>
