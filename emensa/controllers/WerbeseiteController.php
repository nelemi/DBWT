<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');

class WerbeseiteController
{ public function index(RequestData $request) {
    return view('hauptseite.pages.hauptseite_page', ['rd' => $request ]);
}
public function dbconnect() {
    $gericht = db_gerichttabelle_select_all();
    $allergen = db_allergen_select_all();
    $gerichthatallergen = db_gericht_hat_allergen_select_all();
    // Frage Daten aus kategorie ab:
    // $data = db_kategorie_select_all();
    return view('demo.dbdata', ['data' => $data]);
}
}
// welche View dann?