<?php
function db_select_email_and_password($mail, $password) {
    $link = connectdb();

    $sql3 = "SELECT *  FROM benutzer WHERE email = '$mail' AND passwort = '$password' " ;

    $result3 = mysqli_query($link, $sql3);

    $data3 = mysqli_fetch_all($result3, MYSQLI_BOTH);

    mysqli_close($link);
    return $data3;
}
