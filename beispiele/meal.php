<?php
/**
 * Praktikum DBWT. Autoren:
 * Amelie, Petersen, 3661323
 * Nele, Mikkelsen, 3650167
 */
?>

<?php
const GET_PARAM_MIN_STARS = 'search_min_stars';
const GET_PARAM_SEARCH_TEXT = 'search_text';
const GET_SHOW_DESCRIPTION = 'show_description';
const GET_SPRACHE = 'sprache';
const GET_FLOPP_ODER_TOP = 'flopp_oder_top';

/**
 * List of all allergens.
 */
$allergens = [
    11 => 'Gluten',
    12 => 'Krebstiere',
    13 => 'Eier',
    14 => 'Fisch',
    17 => 'Milch'
];

$meal = [
    'name' => 'Süßkartoffeltaschen mit Frischkäse und Kräutern gefüllt',
    'description' => 'Die Süßkartoffeln werden vorsichtig aufgeschnitten und der Frischkäse eingefüllt.',
    'price_intern' => 2.90,
    'price_extern' => 3.90,
    'allergens' => [11, 13],
    'amount' => 42             // Number of available meals
];
$preis_intern = Number_format($meal['price_intern'], 2,',','.');
$preis_extern =Number_format($meal['price_extern'], 2,',','.');

$ratings = [
    [   'text' => 'Die Kartoffel ist einfach klasse. Nur die Fischstäbchen schmecken nach Käse. ',
        'author' => 'Ute U.',
        'stars' => 2 ],
    [   'text' => 'Sehr gut. Immer wieder gerne',
        'author' => 'Gustav G.',
        'stars' => 4 ],
    [   'text' => 'Der Klassiker für den Wochenstart. Frisch wie immer',
        'author' => 'Renate R.',
        'stars' => 4 ],
    [   'text' => 'Kartoffel ist gut. Das Grüne ist mir suspekt.',
        'author' => 'Marta M.',
        'stars' => 3 ]
];
// array mit allen englischen Texten

$english = [
        'Gericht' => 'dish',
        'Bewertungen' => 'ratings',
        'insgesamt' => 'in total',
        'Suchen' => 'search',
        'Sterne' => 'stars',
        'Autor' => 'author'];

// Parameter abfragen
$ausgabe = [];
if (!empty($_GET[GET_SPRACHE])) {
    if (($_GET[GET_SPRACHE]) == 'en') {
        foreach ($english as $wort => $uebersetzung) {
            $ausgabe [$wort] = $uebersetzung;
        }
    }
    elseif ($_GET[GET_SPRACHE] == 'de') {
        foreach ($english as $wort => $uebersetzung){
            $ausgabe [$wort] = $wort;
        }
    }
}
else {
    foreach ($english as $wort => $uebersetzung){
        $ausgabe [$wort] = $wort;
    }
}
//Filterung der Bewertungen
$showRatings = [];
$searchTerm = "";
if (!empty($_GET[GET_PARAM_SEARCH_TEXT])) {
    $searchTerm = strtolower($_GET[GET_PARAM_SEARCH_TEXT]);
    foreach ($ratings as $rating) {
        $lower_text = strtolower($rating['text']);
        if (strpos($lower_text, $searchTerm) !== false) {
            $showRatings[] = $rating;
        }
    }
} else if (!empty($_GET[GET_PARAM_MIN_STARS])) {
    $minStars = $_GET[GET_PARAM_MIN_STARS];
    foreach ($ratings as $rating) {
        if ($rating['stars'] >= $minStars) {
            $showRatings[] = $rating;
        }
    }
} else {
    $showRatings = $ratings;
}
$max = -10000000;
$min = 10000000;
$list_of_max = [];
$list_of_min = [];
foreach ($ratings as $rating) {
    if ($rating['stars'] >= $max){
        $max = $rating['stars'];
    }
    if ($rating['stars'] <= $min){
        $min = $rating['stars'];
    }
}
foreach ($ratings as $rating) {
    if ($rating['stars'] == $max){
        $list_of_max[] = $rating;
    }
    if ($rating['stars'] == $min){
        $list_of_min[] = $rating;
    }
}

// Flopp oder Top
$flopp_oder_top = [];
if (!empty($_GET[GET_FLOPP_ODER_TOP])) {
    if ($_GET[GET_FLOPP_ODER_TOP] == 'flop') {
      $flopp_oder_top = $list_of_min;
    }
    elseif ($_GET[GET_FLOPP_ODER_TOP] == 'top') {
        $flopp_oder_top = $list_of_max;
    }
}

 function description ($meal) {
      if (isset($_GET[GET_SHOW_DESCRIPTION]) && $_GET[GET_SHOW_DESCRIPTION] === '0') {
          return NULL;
      } else {
          return $meal['description'];
      }
}

function calcMeanStars (array $ratings) : float {
    $sum = 0;
    foreach ($ratings as $rating) {
        $sum += $rating['stars'];
    }
    return $sum/ count($ratings);
}

?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8"/>
        <title>Gericht: <?php echo $meal['name']; ?></title>
        <style>
            * {
                font-family: Arial, serif;
            }
            .rating {
                color: darkgray;
            }
        </style>

    </head>
    <body>
        <h1><?php echo $ausgabe ['Gericht']?>: <?php echo $meal['name']; ?></h1>
        <p><?php echo description($meal)?></p>
        <h1><?php echo $ausgabe ['Bewertungen']?> ( <?php echo $ausgabe ['insgesamt']?>: <?php echo calcMeanStars($ratings); ?>)</h1>
        <form method="get">
            <label for="search_text">Filter:</label>
            <input id="search_text" type="text" name="search_text" placeholder="<?php echo $searchTerm ?>">
            <input type="submit" value="<?php echo $ausgabe ['Suchen']?>">
        </form>
        <table class="rating">
            <thead>
            <tr>
                <td>Text</td>
                <td><?php echo $ausgabe ['Sterne'] ?></td>
                <td><?php echo $ausgabe ['Autor'] ?></td>
            </tr>
            </thead>
            <tbody>
            <?php
        foreach ($showRatings as $rating) {
            echo "<tr><td class='rating_text'>{$rating['text']}</td>
                      <td class='rating_stars'>{$rating['stars']}</td>
                      <td class='rating_text'> {$rating['author']}</td>
                  </tr>";
        }
        ?>

            </tbody>
        </table>
        <ul>
            <?php
            foreach ($allergens as $allergen) {
                echo "<li> $allergen </li>";
            }?>
        </ul>
    <p> <?php echo "Preis extern: $preis_extern € <br> Preis intern: $preis_intern €"?></p>
    <table><?php foreach ($flopp_oder_top as $bewertung) {
        echo "<tr><td>{$bewertung['text']}</td>
                      <td> {$bewertung['stars']}</td>
                      <td> {$bewertung['author']}</td>
                 </tr>";
        }?>
    </table>
    </body>
</html>