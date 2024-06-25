<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/hauptseite_gerichttabelle.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/hauptseite_gerichthatallergen.php');

class WerbeseiteController
{
    public function anmeldung(RequestData $request)
{
        return view ('hauptseite.pages.anmeldung_page');
}
    public function check_anmeldung(RequestData $request)
    {
        $mail = $rd->query['email'] ?? false;
        $password = $rd->query['password'] ?? false;

        $_SESSION['target'] = 'hauptseite.pages.hauptseite_page';
        $_SESSION['login_result_message'] = null;
        $erfolgreich = false;

        if ($erfolgreich) {
            $_SESSION['login_ok'] = true;
            $target = $_SESSION['target'];
            header('Location:/' . $target);
        }
    else {$_SESSION['login_result_message'] = 'Name oder Passwort falsch';
        header('Location:/anmeldung');

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