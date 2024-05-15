<?php
/**
 * Praktikum DBWT. Autoren:
 * Amelie, Petersen, 3661323
 * Nele, Mikkelsen, 3650167
 */
?>
<?php
session_start();
if(!isset($_SESSION['zaehler'])){
    $_SESSION['zaehler'] = 0;
}
$_SESSION['zaehler']++;

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
        <table id="auswahl">
            <thead>
            <tr>
                <th></th>
                <th>Preis intern</th>
                <th>Preis extern</th>
                <th>Bild des Gerichts</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo gerichte()?></td>
                <td>3,50</td>
                <td>6,20</td>
                <td><img src="/werbeseite/img/rindfleisch.png" width="100" height="50" alt="Rindfleisch mit Bambus"</td>
            </tr>
            <tr>
                <td><?php echo gerichte( 1)?></td>
                <td>2,90</td>
                <td>5,30</td>
                <td><img src="/werbeseite/img/spinatrisotto.jpg" width="100" height="50" alt="Spinatrisotto"</td> </tr>
            <tr>
                <td><?php echo gerichte(2)?></td>
                <td>5,00</td>
                <td>9,50</td>
                <td><img src="/werbeseite/img/tortellini.jpg" width="100" height="50" alt="Tortellini"</td>
            </tr>
            <tr>
                <td><?php echo gerichte( 3)?></td>
                <td>2,50</td>
                <td>4,80</td>
                <td><img src="/werbeseite/img/waffeln.jpg" width="100" height="50" alt="Waffeln"</td>
            </tr>
            <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
            </tr>
            </tbody>
        </table>
        </div>
    </section>
    <section id="Zahlen">
        <h2>E-Mensa in Zahlen</h2>
        <div class="flexi">
            <div>
                <?php
                echo "Die Seite wurde {$_SESSION['zaehler']} mal besucht.";
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
            echo "Es gibt $anzahl_gerichte Speisen. "
            ?>
        </div>
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