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
    {
        $mail = $request->query['email'] ?? false;
        $password = $request->query['password'] ?? false;
        $name_user = 'Kein Benutzer';

        $_SESSION['target'] = 'hauptseite.pages.hauptseite_page';
        $_SESSION['login_result_message'] = null;
        $erfolgreich = false;
        $user_exists = false;
        if ($mail && $password) {
            $user = db_select_email_and_password($mail, $password);
            if (count($user) > 0) {     //wie bei num_rows nur als Variable gespeichert, damit ich gleich besser auf die ID zugreifen kann
                //Benutzer existiert so/mail und passwort stimmen überein
                $erfolgreich = true;
                $user_exists = true;
                $id = $user[0]['id']; //man greift auf das erste und einzige Element (Index 0) im Rückgabe-Array der Funktion db_select_email_and_passwort
                                        // mit der entsprechenden ID zu, um an alle Einträge zu gelangen
                inkrementiere_zaehler($id);
            } else {
                // Benutzer existiert zwar, aber E-Mail/Passwort stimmen nicht überein, führt also zu einer fehlerhaften Anmeldung
                $result = db_select_email_and_password($mail, '');
                if (count($result) > 0) {
                    $user_exists = true;
                }
            }
        }
        if ($erfolgreich) {
            $_SESSION['login_ok'] = true;
            $target = $_SESSION['target'];
            header('Location:/' . $target);
            $name_user = db_select_name($mail);
            return view('hauptseite.pages.hauptseite_page',['Name_benutzer'=> $name_user]);
        }
        else {
            if ($user_exists){
                setze_letzten_fehler($mail);
            }
            $_SESSION['login_result_message'] = 'Name oder Passwort falsch';
            header('Location:/anmeldung');
            exit();
            return view('hauptseite.pages.anmeldung_page',['Fehlermeldung'=> $_SESSION['login_result_message']]);

        }
        }
    public function index(RequestData $request)
    {
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