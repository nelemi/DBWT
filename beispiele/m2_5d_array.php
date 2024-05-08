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
        $new = "";
        foreach ($famousMeals as $meal => $value) {
            foreach ($famousMeals[$meal] as $mealValue) {
              $name=  $mealValue;
              if ($famousMeals[$meal] =='winner'){
                 foreach ($famousMeals[$meal] as $jahreszahlen) {
                     $new .= $jahreszahlen;
                 }
              }
              else {
                  echo $name;
              }
            }echo "\n $new" ; //hallo
        } ?>

    </ol>

</body>
</html>