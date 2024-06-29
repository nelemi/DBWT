<?php
function db_select_email_and_password($link, $mail, $password) { //Jetzt immer Link als Parameter übergeben und nicht bei jeder Funktion neu eine
                                                //Verbindung mit der Datenbank aufbauen => Alles in einer Transaktion und übersichtlicher
    $sql3 = "SELECT *  FROM benutzer WHERE email = '$mail' AND passwort = '$password' " ;
    $result3 = mysqli_query($link, $sql3);
    return mysqli_fetch_all($result3, MYSQLI_BOTH);
}

function inkrementiere_zaehler($link, $id) { // jetzt mit Prozeduraufruf
    // vorher
    //$sql4 = "UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen + 1, letzteanmeldung = NOW() WHERE id = '$id' ";

    $sql4 = "UPDATE benutzer SET letzteanmeldung = NOW() WHERE id = '$id' ";
    mysqli_query($link, $sql4);

    $sql_procedure = "CALL inkrementiere_anmeldungen($id)"; //Prozedur aufrufen
    mysqli_query($link, $sql_procedure);

}

function setze_letzten_fehler($link, $mail) {
    $sql5 = "SELECT email FROM benutzer WHERE email = '$mail' ";
    $result5 = mysqli_query($link, $sql5);
    if (mysqli_num_rows($result5) > 0) {
        $sql6 = "UPDATE benutzer SET letzterfehler = NOW() WHERE email = '$mail'"; //hier auch $mail eigentlich
        mysqli_query($link, $sql6);
    } else {
        echo "E-Mail-Adresse nicht in der Datenbank gefunden: " . $mail;
    }
}

function db_select_name($link, $mail){
    $sql_benutzer_name = "SELECT name FROM benutzer WHERE email = '$mail' " ;
    $result_benutzer_name = mysqli_query($link, $sql_benutzer_name);
    $data_benutzer_name = mysqli_fetch_assoc($result_benutzer_name);
    // in fetch_assoc geändert und dann auf ['name'] zugegriffen, weil nur ein einzelner Wert ausgegeben werden muss
    return $data_benutzer_name['name'];
}