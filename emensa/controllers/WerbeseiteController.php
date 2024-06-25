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

        $_SESSION['target'] = 'hauptseite.pages.hauptseite_page';
        $_SESSION['login_result_message'] = null;
        $erfolgreich = false;
        if ($mail && $password) {
            if (db_select_email_and_password($mail, $password)->num_rows > 0) {
                //Benutzer existiert so/mail und passwort stimmen überein
                $erfolgreich = true;
            }
        }
        if ($erfolgreich) {
            $_SESSION['login_ok'] = true;
            $target = $_SESSION['target'];
            header('Location:/' . $target);
            exit; //Wichtig Skriptbeendung nach Weiterleitung
        }
        else {
            $_SESSION['login_result_message'] = 'Name oder Passwort falsch';
            header('Location:/anmeldung');
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