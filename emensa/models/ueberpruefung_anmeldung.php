<?php
function db_select_email_and_password($mail, $password) {
    $link = connectdb();

    $sql3 = "SELECT *  FROM benutzer WHERE email = '$mail' AND passwort = '$password' " ;
    $result3 = mysqli_query($link, $sql3);
    $data3 = mysqli_fetch_all($result3, MYSQLI_BOTH);
    mysqli_close($link);
    return $data3;
}

function inkrementiere_zaehler($id) {
    $link = connectdb();
    $sql4 = "UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen + 1, letzteanmeldung = NOW() WHERE id = '$id' ";

    mysqli_query($link, $sql4);
    mysqli_close($link);
}

function setze_letzten_fehler($mail) {
    $link = connectdb();
    $sql5 = "UPDATE benutzer SET letzterfehler = NOW() WHERE email = '$mail'";
    mysqli_query($link, $sql5);
    mysqli_close($link);
}

