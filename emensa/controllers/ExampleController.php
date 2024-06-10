<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');

class ExampleController
{
    public function m4_6a_queryparameter(RequestData $rd) {
        $parametername = isset($_GET['name']) ? $_GET['name'] : '';

        return view('examples.m4_7a_queryparameter', [
            'request'=>$rd,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
            'names' => $parametername,
        ]);
    }
    public function m4_7b_kategorie(RequestData $rd) {
        $link = connectdb();

        $sql = 'SELECT DISTINCT ghk.kategorie_id, k.name
                    FROM gericht_hat_kategorie ghk
                    LEFT JOIN kategorie k ON ghk.kategorie_id= k.id
                    ORDER BY name ASC';
        $result = mysqli_query($link, $sql);

        $data = mysqli_fetch_all($result, MYSQLI_BOTH);

        mysqli_close($link);
    }
    }
}