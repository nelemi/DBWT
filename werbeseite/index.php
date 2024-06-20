<?php
/**
 * Praktikum DBWT. Autoren:
 * Amelie, Petersen, 3661323
 * Nele, Mikkelsen, 3650167
 */
?>
<?php
include 'gerichte_array.php';
include 'mensa_formdata.php';
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>werbeseite</title>
    <style>
        body {
            width: 700px;
            margin: auto;
            font-family:Sylfaen;
        }
        h2.mitte {
            display: flex;
            justify-content: center;
            margin: auto;
        }
        #Message {
            padding: 20px 10px;
            border: 2px solid black;
            justify-content: center;
        }
        div.gridcon {
            display: grid;
            border: 1px solid black;
            height: auto;
        }
        table {
            border-collapse: collapse;
        }
        th, tr:last-child {
            border: 2px solid black;
        }
        td {
            border:1px solid grey;
        }
        div.flexi {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
        }
        div.important {
            display: flex;
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
            font-weight: bold;
        }
        div.forms {
            display: flex;
            gap: 10px;
        }
        input#floati {
            float: right;
        }
        header {
            height: auto;
            text-align: center;
            top: 20px;
            display:inline-flex;
            gap: 10px;border-bottom: 1px solid #282A25;
        }
        #bild {
            display: flex;
            justify-content: center;
        }
        section {
            margin-top: 30px;
        }
        .navigation {
            list-style-type: none;
            padding-left: 0;
        }
        .navelement {
            display: inline;
            height: 40px;
            margin: 20px;
        }
        .navelement a {
            font-size: 13px;
            color:#282A25;
            text-decoration: none;
            text-transform: uppercase;

        }
        .navelement a:hover {
            color:#B56029;
        }
        .navelement a.active {
            color: #B56029;
        }
        footer {
            border-top: 1px solid #282A25;
            display: flex;
            justify-content:center;margin-top: 30px;
        }
        footer li {
            display: inline;
            border-right: 2px solid #282A25;
            padding: 0 15px;
        }
        footer li:nth-child(3) {
            border-right: none;
            color: #B56029;
        }
    </style>
</head>
<body>
<header>
    <img id="Logo" src="../emensa/public/img/logo_groß.jpg" alt="Mensalogo: Ein Mann mit Schnurrbart in bunten Farben" width="60" height="60" title="Mensalogo">
    <nav>
        <ul class=navigation>
            <li class="navelement"><a href="#ankündigung" class="nav-link">Ankündigung</a></li>
            <li class="navelement"><a href="#speisen" class="nav-link">Speisen</a></li>
            <li class="navelement"><a href="#Zahlen" class="nav-link">Zahlen</a></li>
            <li class="navelement"><a href="#Kontakt" class="nav-link">Kontakt</a></li>
            <li class="navelement"><a href="#Wichtig" class="nav-link">Wichtig für uns</a></li>
        </ul>
    </nav>
</header>
<main>
    <section id="bild">
    <img src="../emensa/public/img/titelbild_final.jpg" alt="Ein Bild einer Mensa mit bunten Stühlen" width="400" height="267" title="Mensabild">
    </section>
    <section id="ankündigung">
        <h2>Bald gibt es Essen auch online ;)</h2>
        <div id="Message">
            Liebe Studierende,
            wir freuen uns, Ihnen mitteilen zu können, dass wir ab sofort einen neuen Service einführen, der
            Ihr Essenserlebnis bei unserer E-Mensa revolutionieren wird. Ab sofort haben Sie die Möglichkeit,
            Ihr Essen ganz bequem online zu bestellen!
            Nie wieder lange Warteschlangen oder verpasste Mahlzeiten! Mit unserem neuen Online-Bestellsystem
            können Sie Ihr Lieblingsessen im Voraus auswählen und bestellen, ganz bequem von Ihrem Smartphone,
            Tablet oder Computer aus. Egal, ob Sie in der Mensa essen möchten oder Ihr Essen lieber mitnehmen -
            mit nur wenigen Klicks ist Ihr Essen bereit, wenn Sie es möchten.
            Unser Online-Menü bietet Ihnen eine Vielzahl von Optionen, von gesunden Salaten bis hin zu herzhaften
            Hauptgerichten und vegetarischen Spezialitäten. Und das Beste daran? Sie können Ihre Bestellung ganz nach
            Ihren individuellen Vorlieben anpassen, damit Ihr Essen genau Ihren Wünschen entspricht.
            Wir sind stolz darauf, Ihnen diesen neuen Service anbieten zu können und freuen uns darauf,
            Ihr Essenserlebnis bei E-Mensa zu verbessern. Besuchen Sie noch heute unsere Website und
            entdecken Sie die Zukunft des Essens!
        </div>
    </section>
    <section id="speisen">
        <h2>Köstlichkeiten, die Sie erwarten</h2>
        <div class="gridcon">
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

            $sql = "SELECT g.name, g.preisintern, g.preisextern, GROUP_CONCAT(gha.code ORDER BY gha.code ASC) AS allergen_codes
                    FROM gericht g
                    LEFT JOIN gericht_hat_allergen gha ON g.id = gha.gericht_id
                    GROUP BY g.id 
                    ORDER BY name ASC
                    LIMIT 5";

            $result = mysqli_query($link, $sql);
            if (!$result) {
                echo "Fehler während der Abfrage:  ", mysqli_error($link);
                exit();
            }

            $sql2 ="SELECT DISTINCT gha.code, a.name
                    FROM gericht_hat_allergen gha
                    LEFT JOIN allergen a ON gha.code = a.code
                    WHERE gha.gericht_id IN (1,3,21,13,10) 
                    ORDER BY name ASC";

            $result2 = mysqli_query($link, $sql2);
            if (!$result2) {
                echo "Fehler während der Abfrage:  ", mysqli_error($link);
                exit();
            }


            ?>
            <table id ="auswahl">
                <thead>
                <tr>
                    <th>Name des Gerichts</th>
                    <th>Preis intern</th>
                    <th>Preis extern</th>
                    <th>Allergen</th>
                </tr>
                </thead>
                <?php
                //Ausgabe aller Gerichtsdaten in einer Tabelle
                $used_allergens_arr_str = [];
                //Speicherung der benutzen allergene in einem Array (Dieses Array hat nun als Werte strings der allergene)
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>', '<td>', $row['name'], '</td>', '<td>', $row['preisintern'], '</td>', '<td>', $row['preisextern'], '</td>', '<td>', $row['allergen_codes'], '</td>','</tr>';
                        $used_allergens_arr_str[] = $row['allergen_codes'];
                    }
                ?>
                <tr>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                </tr>
            </table>
            <ul>
                <?php
                while($row2 = mysqli_fetch_assoc($result2)) {
                    echo '<li>', $row2['code'], ':', $row2['name'], '</li>';
                }
                ?>
            </ul>
        </div>
        </div>
    </section>
    <section id="Zahlen">
        <h2>E-Mensa in Zahlen</h2>
        <div class="flexi">
            <div>
                <?php
                $sql_count = "SELECT count FROM besucher";
                $result_count = mysqli_query($link, $sql_count);

                if ($result_count) { // wenn Abfrage erfolgreich und somit die Website aufgerufen wurde, dann wird der Zähler inkrementiert
                    $row = mysqli_fetch_assoc($result_count);
                    $neuer_count = $row['count'] + 1; // Zähler erhöhen

                    // SQL Anfrage aktualisieren bzw. auf neuen Zähler setzen
                    $sql_neu = "UPDATE besucher SET count = $neuer_count";
                    mysqli_query($link, $sql_neu);
                } else {
                    echo "Fehler während der Abfrage:  ", mysqli_error($link);
                    exit();
                }

                echo "Die Seite wurde $neuer_count Mal besucht. "
                ?>
            </div>
        <div>
            <?php
            $anmelde_file = fopen('./anmeldungen.txt', 'r');
            $counter = 0;
            while (!feof($anmelde_file)) { //Jede Zeile = eine Anmeldung
                fgets($anmelde_file) AND $counter++;
            }
            echo "Es gab $counter Newsletteranmeldungen. ";
            fclose($anmelde_file);
            ?>
        </div>
            <div>
                <?php
                $sql3 = "SELECT COUNT(id) AS anzahl_gerichte FROM gericht";

                $result3 = mysqli_query($link, $sql3);
                if (!$result3) {
                    echo "Fehler während der Abfrage:  ", mysqli_error($link);
                    exit();
                }
                $row3 = mysqli_fetch_assoc($result3);
                echo "Es gibt ", $row3['anzahl_gerichte'], " Gerichte. ";
                ?>
            </div>
            <?php
            mysqli_free_result($result);
            mysqli_close($link);
            ?>
        </div>
    </section>
    <section id="Kontakt">
        <h2>
            Interesse geweckt? Wir informieren Sie!
        </h2>
        <form action="index.php" method="post">
            <?php echo check_form()?>
            <div class="forms">
                <div>
                    <label for="name">Ihr Name:</label>
                    <br>
                    <input type=text id="name" name="name" value="Vorname">
                </div>
                <div>
                    <label for="email">Ihre E-Mail:</label>
                    <br>
                    <input type=text id="email" name="email" value="">
                </div>
                <div>
                    <label for="int">Newsletter bitte in:</label>
                    <br>
                    <select id="int" name="intervall">
                        <option value="Deutsch">Deutsch</option>
                        <option value="Englisch">Englisch</option>
                    </select>
                </div>
            </div>
            <input type="checkbox" name="datenschutz" id="datenschutz">Datenschutzbestimmungen stimme ich zu
            <br>
            <input id="floati" type="submit" name="submit" value="Zum Newsletter anmelden">
        </form>
        <a href="werbeseite/wunschgericht.php">Klicke hier um uns ein Wunschgericht mitzuteilen</a>
    </section>
    <section id="Wichtig">
        <h2>Das ist uns wichtig</h2>
        <div class="important">
        <ul>
            <li>Beste frische saisonale Zutaten</li>
            <li>Ausgewogene abwechslungsreiche Ernährung</li>
            <li>Sauberkeit</li>
        </ul>
        </div>
    </section>
    <h2 class="mitte">Wir freuen uns auf ihren Besuch!</h2>
</main>
<footer>
    <ul>
        <li>(c) E-Mensa GmbH</li>
        <li>Amelie Petersen und Nele Mikkelsen</li>
        <li><a>Impressum</a></li>
    </ul>
</footer>
</body>
</html>