<?php
$password = "abc";
$salt = "dbwt987";
$pwdsalt = sha1($salt . $password);
//echo $pwdsalt;
$pwdsalt2 = sha1($salt . 'amelieundnelesindtoll');
echo $pwdsalt2;