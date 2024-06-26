<?php
/**
 * Mapping of paths to controllers.
 * Note, that the path only supports one level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as expected
 */

return array(
    '/'             => "HomeController@index",
    "/demo"         => "DemoController@demo",
    '/dbconnect'    => 'DemoController@dbconnect',
    '/debug'        => 'HomeController@debug',
    '/error'        => 'DemoController@error',
    '/requestdata'   => 'DemoController@requestdata',

    // Erstes Beispiel:
    '/m4_6a_queryparameter' => 'ExampleController@m4_6a_queryparameter',
    '/m4_7b_kategorie' => 'ExampleController@m4_7b_kategorie',
    '/m4' => 'ExampleController@m4_6a_queryparameter',
    '/m4_7c' => 'ExampleController@m4_7c_gerichte',
    '/m4_7d_layout' => 'ExampleController@m4_7d_layout',

    // Haupseite:
    '/hauptseite' => 'WerbeseiteController@index',

    //Anmeldung:
    '/anmeldung' => 'WerbeseiteController@anmeldung',
    '/anmeldung_verifizieren' => 'WerbeseiteController@check_anmeldung',
    '/abmeldung' => 'WerbeseiteController@abmeldung',



);