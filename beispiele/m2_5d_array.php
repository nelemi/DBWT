<?php
$famousMeals = [
    1 => ['name' => 'Currywurst mit Pommes',
        'winner' => [2001, 2003, 2007, 2010, 2020]],
    2 => ['name' => 'Hähnchencrossies mit Paprikareis',
        'winner' => [2002, 2004, 2008]],
    3 => ['name' => 'Spaghetti Bolognese',
        'winner' => [2011, 2012, 2017]],
    4 => ['name' => 'Jägerschnitzel mit Pommes',
        'winner' => 2019]
];
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8"/>
        <title>Arrays</title>
    </head>
<body>
    <ol>
        <?php
        //implode(",", $famousMeals['winner']);
        foreach ($famousMeals as $Anzahl => $arrays) {
            $name = $arrays['name'];
            $winner = $arrays['winner'];
            $string_winner = "";
            if (is_array($winner) ) {
                $string_winner = implode(',', $winner);
            }
            else {
                $string_winner = strval( $winner );
            }
            echo "<li>$name \n $string_winner</li>";

             //hallo
        } ?>

    </ol>

</body>
</html>