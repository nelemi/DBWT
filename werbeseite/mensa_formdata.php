<?php
/**
 * Praktikum DBWT. Autoren:
 * Amelie, Petersen, 3661323
 * Nele, Mikkelsen, 3650167
 */
?>
<?php
$kontakte_newsletter = [];
function no_leerzeichen ($Name){
    $Name_new = trim($Name);
    $korrekt = false;
    if (strlen($Name_new) != 0){
      $korrekt = true;
    }
    return $korrekt;
}
function check_form(){
    $ausgabe = "";
    if (isset($_POST['submit'])) {
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
                            $ausgabe = 'Ihre E-Mail entspricht nicht den Vorgaben.';
                            return $ausgabe;
                        }
                    } else {
                        $ausgabe = 'Ihre E-Mail entspricht nicht den Vorgaben.';
                        return $ausgabe;
                    }
                } else {
                    $ausgabe = 'Sie müssen noch das Häckchen der Datenschutzerklärung setzen.';
                    return $ausgabe;
                }
            } else {
                $ausgabe = 'Ihr Name ist leider leer.';
                return $ausgabe;
            }
        } else {
            $ausgabe = 'Ihr Name ist leider leer.';
            return $ausgabe;
        }
    }
    $ausgabe = 'Die Speicherung ihrer Anmeldung war erfolgreich.';
    return $ausgabe;
}

