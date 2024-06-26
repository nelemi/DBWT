<?php

$salt = "dbwt987";

$passwordAmnele = "abc";
$pwdsalt = sha1($salt . $passwordAmnele);
//echo $pwdsalt;


$passwordLara = "amelieundnelesindtoll";
$pwdsalt2 = sha1($salt . "amelieundnelesindtoll"); //Passwörter für beide Benutzer hashen, um in tabelle einzutragen
//echo $pwdsalt2;