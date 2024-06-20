
<?php
// muss Funktion dann quasi immer vor SELECT Statements in der Page eingeführt werden??
// Oder müssen die in den Controller und wenn ja, wie?
    function db_gerichttabelle_select_all() {
        $link = connectdb();

        $sql1 = "SELECT g.name, g.preisintern, g.preisextern, g.bildname, GROUP_CONCAT(gha.code ORDER BY gha.code ASC) AS allergen_codes
                    FROM gericht g
                    LEFT JOIN gericht_hat_allergen gha ON g.id = gha.gericht_id
                    GROUP BY g.id 
                    ORDER BY name ASC
                    LIMIT 5";

        $result1 = mysqli_query($link, $sql1);

        $data1 = mysqli_fetch_all($result1, MYSQLI_BOTH);

        mysqli_close($link);
        return $data1;
    }
