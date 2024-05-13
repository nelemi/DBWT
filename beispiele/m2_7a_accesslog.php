<?php
$accesslog_datei ='accesslog.txt';

$datum_uhrzeit = date('Y-m-d H:i:s');
$browser = $_SERVER['HTTP_USER_AGENT'];
$ip_adresse = $_SERVER['REMOTE_ADDR'];

$accesslog_nachricht = "$datum_uhrzeit - Browser: $browser - IP-Adresse: $ip_adresse . \r\n";
file_put_contents($accesslog_datei, $accesslog_nachricht, FILE_APPEND);
echo "alles paletti :)";