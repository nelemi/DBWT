<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');

class WerbeseiteController
{ public function index(RequestData $request) {
    return view('hauptseite.pages.hauptseite_page', ['rd' => $request ]);
}
}