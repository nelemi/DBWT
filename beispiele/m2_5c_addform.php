<?php
/**
 * Praktikum DBWT. Autoren:
 * Amelie, Petersen, 3661323
 * Nele, Mikkelsen, 3650167
 */
?>
<?php
include_once 'm2_5a_standardparameter.php';
const GET_PARAM_ZAHL_A = 'a';
const GET_PARAM_ZAHL_B= 'b';

$zahl_a = 0;
if (!empty($_GET[GET_PARAM_ZAHL_A])) {
    $zahl_a = ($_GET[GET_PARAM_ZAHL_A]);

}

$zahl_b = 0;
if (!empty($_GET[GET_PARAM_ZAHL_B])) {
    $zahl_b = ($_GET[GET_PARAM_ZAHL_B]);

}

?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8"/>
        <title> Formular und addieren </title>
    </head>
    <body>
    <form method="get">
        <label for="zahl_a">a</label>
        <br>
        <input type="text" id="zahl_a" name="a" size=30 placeholder="a">
        <br>
        <label for="zahl_b">b</label>
        <br>
        <input type="text" id="zahl_b" name="b" size=30 placeholder="b">
        <br>
        <input type="submit" value="addieren" name="addieren">
        <input type="submit" value="multiplizieren" name="multiplizieren">
    </form>
        <?php
        if (isset($_GET[GET_PARAM_ZAHL_A])) {
            if (isset($_GET[GET_PARAM_ZAHL_B])) {
                if (isset($GET['addieren'])) {
                    echo addieren($zahl_a, $zahl_b);//wird nie ausgegeben!!!!!
                }
                elseif (isset($_GET['multiplizieren'])) {
                    echo $zahl_a * $zahl_b;
                }
            }
        }
        ?>
    </body>
</html>

