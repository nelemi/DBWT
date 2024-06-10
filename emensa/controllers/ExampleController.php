<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');

class ExampleController
{
    public function m4_6a_queryparameter(RequestData $rd) {
        $parametername = isset($_GET['name']) ? $_GET['name'] : '';

        return view('examples.m4_7a_queryparameter', [
            'request'=>$rd,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
            'name' => $parametername,
        ]);
    }
}