<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/hauptseite_gerichttabelle.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/hauptseite_gerichthatallergen.php');

class WerbeseiteController
{
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