<?php
$password = "PasswortzurAnmeldung007";
$salt = "DbWt2024!";
$pwdsalt = sha1($salt . $password);
echo $pwdsalt;
//Passwort: 3340634a2cf0e4f8676ad3ba176a18b8ab00d229
