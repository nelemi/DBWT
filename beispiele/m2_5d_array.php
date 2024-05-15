<?php
/**
 * Praktikum DBWT. Autoren:
 * Amelie, Petersen, 3661323
 * Nele, Mikkelsen, 3650167
 */
?>
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
function no_winners ($meals){
    $no_winners = [];
    for ($year = 2000; $year < 2025; $year++){
        $no_winner = true;
        foreach ($meals as $meal){
            $winner = $meal['winner'];
            if (is_array($winner)){
                if (in_array($year, $winner)){
                    $no_winner = false;
                    break;
                }
                }else {
                  if ($year == $winner){
                    $no_winner = false;
                    break;
                }
                  }
            }
        if ($no_winner){
            $no_winners[] = $year;
        }
        }
           return $no_winners;
}
$result = no_winners($famousMeals);
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
                for ($i = count($winner)-1; $i >= 0; $i--) {
                    $string_winner .= $winner[$i];
                    if ($i > 0) {
                        $string_winner .= ',';
                    }
                }
            }
            else {
                $string_winner = strval( $winner );
            }
            echo "<li>$name <br> $string_winner</li> <br>";
        } ?>
    </ol>
<p> No winners for the years: <?php echo implode(",",$result) ?></p>
</body>
</html>