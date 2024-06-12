<?php
/**
 * Praktikum DBWT. Autoren:
 * Amelie, Petersen, 3661323
 * Nele, Mikkelsen, 3650167
 */
?>

@extends('werbeseite_layout.blade.php')

@section('css')
@include('css.hauptseite')
@endsection

@section('header')
<header>
    <img id="Logo" src="logo_groß.jpg" alt="Mensalogo: Ein Mann mit Schnurrbart in bunten Farben" width="60" height="60" title="Mensalogo">
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
@endsection

@section('main')
<main>
    <section id="bild">
        <img src="titelbild_final.jpg" alt="Ein Bild einer Mensa mit bunten Stühlen" width="400" height="267" title="Mensabild">
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
            $password = "Swammy2504"; // Passwort a: "Swammy2504", n:"webtech#12"
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
</main>
@endsection

@section('footer')
<footer>
    <ul>
        <li>(c) E-Mensa GmbH</li>
        <li>Amelie Petersen und Nele Mikkelsen</li>
        <li><a>Impressum</a></li>
    </ul>
</footer>
@endsection
