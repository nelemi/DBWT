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
    $password = "Swammy2504"; // Passwort a: "Swammy2504", n:"webtech#12"
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
          $name = isset($_POST['name']) && !empty($_POST['name']) ? mysqli_real_escape_string($link, $_POST['name']) : 'anonym';
          $email = isset($_POST['email']) ? mysqli_real_escape_string($link, $_POST['email']) : '';
          $gericht_name = isset($_POST['gericht_name']) ? mysqli_real_escape_string($link, $_POST['gericht_name']) : '';
          $beschreibung = isset($_POST['beschreibung']) ? mysqli_real_escape_string($link, $_POST['beschreibung']) : '';

          $sql_ersteller = "SELECT eid FROM erstellerin WHERE name = '$name' AND mail = '$email'"; # Lösung ChatBot, vorher kamen Fehler auf, dass die Eingabe mehrere Rows hat
          $ersteller_result = mysqli_query($link, $sql_ersteller);

          //hinzugefügt
          if (!$ersteller_result) {
              die("Fehler bei der Ersteller-Abfrage: " . mysqli_error($link));
          }

          if (mysqli_num_rows($ersteller_result) == 0) {
              // Ersteller einfügen
              //Prepared Statements einfügen (1.)
              $statement = mysqli_stmt_init($link);
              if (mysqli_stmt_prepare($statement, "INSERT INTO erstellerin (name, mail) VALUES (?, ?)")) {
                  mysqli_stmt_bind_param($statement, "ss", $name, $email);
                  if (mysqli_stmt_execute($statement)) {
                      $ersteller_id = mysqli_insert_id($link);
                  } else {
                      die("Fehler beim Einfügen des Erstellers: " . mysqli_error($link));
                  }
                  mysqli_stmt_close($statement);
              }

          } else {
              // Bestehende Ersteller-ID abrufen
              $ersteller_row = mysqli_fetch_assoc($ersteller_result);
              $ersteller_id = $ersteller_row['eid'];
          }

          //Prepared Statements einfügen (2.)
          $statement_wg = mysqli_stmt_init($link);
          if (mysqli_stmt_prepare($statement_wg, "INSERT INTO wunschgericht (name, beschreibung, erstellungsdatum, erstellerinid) VALUES (?, ?, NOW(), ?)")){
              mysqli_stmt_bind_param($statement_wg, "ssi", $name, $beschreibung, $ersteller_id);
              if (mysqli_stmt_execute($statement_wg)) {
                  echo "Wunschgericht erfolgreich eingetragen!";
              } else {
                  echo "Fehler während der Abfrage: ", mysqli_error($link);
              }
              mysqli_stmt_close($statement_wg);
          } else {
              echo "Fehler beim Erstellen des Statements für Wunschgericht: " . mysqli_error($link);
          }
            mysqli_close($link);
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
