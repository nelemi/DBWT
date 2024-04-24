
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Lieferanten</title>
</head>
<body>
<ul>
 <?php
    $array = [
        'Rewe' => [56062,56064],
        'Lieferheld' => [52134,56062]];
    foreach ($array as $Lieferant => $plzs) {
        echo "<li>$Lieferant";
        echo "<ol>";
        foreach ($plzs as $plz) {
            echo "<li>$plz</li>"
        }
    }
?>
</body>
</html>