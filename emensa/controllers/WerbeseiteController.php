<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/hauptseite_gerichttabelle.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/hauptseite_gerichthatallergen.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/ueberpruefung_anmeldung.php');

class WerbeseiteController
{
    public function anmeldung(RequestData $request)
{
        return view ('hauptseite.pages.anmeldung_page');
}
    public function check_anmeldung(RequestData $request)
    {   logger()->info('Anmeldung');
        $mail = $request->query['email'] ?? false;
        $password = $request->query['password'] ?? false;
        $_SESSION['name_user'] = 'Kein Benutzer';

        $_SESSION['target'] = 'hauptseite'; //nur hauptseite verwenden, nicht hauptseite.pages...
        $_SESSION['login_result_message'] = null;
        $erfolgreich = false;
        $user_exists = false;
        if ($mail && $password) {
            $salt = 'dbwt987'; // Wähle salt, gleich für jeden Nutzer
            $password = sha1($salt . $password); // hashe Passwort
            $link = connectdb();
            mysqli_begin_transaction($link); //Transaktion beginnen
            //Klappt

            try { //alles innerhalb von try wird mit derselben Verbindung $link ausgeführt
                $user = db_select_email_and_password($link, $mail, $password);
                if (count($user) > 0) {     //wie bei num_rows nur als Variable gespeichert, damit ich gleich besser auf die ID zugreifen kann
                    //Benutzer existiert so/mail und passwort stimmen überein
                    $erfolgreich = true;
                    $id = $user[0]['id']; //man greift auf das erste und sowieso EINZIGE Element (Index 0) im Rückgabe-Array der Funktion db_select_email_and_passwort
                    // mit der entsprechenden ID zu, um an alle Einträge zu gelangen
                    inkrementiere_zaehler($link, $id); //M5 Aufgabe 1 aber auskommentiert, wg. Aufgabe 5 (Prozedur)
                }
                if ($erfolgreich) {
                    $_SESSION['login_ok'] = true;
                    $target = $_SESSION['target'];
                    header('Location:/' . $target);
                    $name_user = db_select_name($link, $mail);
                    $_SESSION['name_user'] = $name_user;
                    mysqli_commit($link); // Nur speichern, wenn alles erfolgreich war
                    exit;
                } else {
                    setze_letzten_fehler($link, $mail);
                    //Die Methode heißt warning und nicht warn!!
                    logger()->warning('fehlgeschlagene Anmeldung');
                    // diese Variable in View Objekt aufrufen und an Nutzer ausgeben dann wieder danach löschen
                    $_SESSION['login_result_message'] = 'Name oder Passwort falsch';
                    mysqli_commit($link); // Fehler speichern
                    header('Location:/anmeldung');
                    exit();
                }

            } catch (Exception $e) {
            mysqli_rollback($link);
            throw $e;
            } finally {
                mysqli_close($link);
            }
        } else { // Wenn Name und Passwort falsch, dann wird direkt fehler ausgegeben
            $_SESSION['login_result_message'] = 'Name oder Passwort falsch';
            header('Location:/anmeldung');
            exit();
        }
    }
    // Hier Funktion für Abmeldung, leitet wieder auf Anmeldeseite
    public function abmeldung (RequestData $request){
        logger()->info('Abmeldung');
    header('Location:/anmeldung');
    session_destroy();
    session_regenerate_id();
    exit();
}
    public function index(RequestData $request)
    {   //$_SESSION['name_user'] = 'Kein Benutzer';
        logger()->info('Hauptseite wurde aufgerufen');
        $gericht = db_gerichttabelle_select_all();
        $gerichthatallergen = db_gericht_hat_allergen_select_all();
        return view('hauptseite.pages.hauptseite_page', ['gerichte' => $gericht, 'gericht_hat_allergen' => $gerichthatallergen]);
    }

    public function gericht()
    {
        $gericht = db_gerichttabelle_select_all();
        // Frage Daten aus kategorie ab:
        // $data = db_kategorie_select_all();
        return view('hauptseite.pages.hauptseite_page', ['gericht' => $gericht]);
    }

    public function gerichthatallergen()
    {
        $gerichthatallergen = db_gericht_hat_allergen_select_all();
        return view('hauptseite.pages.hauptseite_page', ['gerichthatallergen' => $gerichthatallergen]);
    }
}
// welche View dann?