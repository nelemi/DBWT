<?php
var_dump($_POST);
$kontakte_newsletter = [];
function no_leerzeichen ($Name){
    $Name_new = trim($Name);
    if (strlen($Name_new) != 0){
      return true;
    }
}
if ($_POST['submitted']) {
    $fehler = false;
    $sprache = $_POST['intervall'];
    if (isset($_POST['name'])) {
        $Name = $_POST['name'];
        if (no_leerzeichen($Name)) {
            if (isset($_POST['datenschutz'])) {
                $email = $_POST['email'] ?? NULL;
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if ($email != 'rcpt.at' && $email != 'damnthespam.at' && $email != 'wegwerfmail.de' && $email != 'trashmail.*') {
                        $person = array('Email' => $email, 'Sprache' => $sprache);
                        $kontakte_newsletter[$Name] = $person;
                    } else {
                        $fehler =  'Ihre E-Mail entspricht nicht den Vorgaben.';
                    }
                } else {
                    $fehler = 'Ihre E-Mail entspricht nicht den Vorgaben.';
                }
            } else {
                $fehler = 'Sie müssen noch das Häckchen der Datenschutzerklärung setzen.';
            }
        } else {
            $fehler = 'Ihr Name ist leider leer.';
        }
    }
    else {
            $fehler =  'Ihr Name ist leider leer.';
        }
}
