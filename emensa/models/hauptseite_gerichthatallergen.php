<?php
function db_gericht_hat_allergen_select_all() {
    $link = connectdb();

    $sql2 = "SELECT DISTINCT gha.code, a.name
                    FROM gericht_hat_allergen gha
                    LEFT JOIN allergen a ON gha.code = a.code
                    WHERE gha.gericht_id IN (1,3,21,13,10) 
                    ORDER BY name ASC ";

    $result2 = mysqli_query($link, $sql2);

    $data2 = mysqli_fetch_all($result2, MYSQLI_BOTH);

    mysqli_close($link);
    return $data2;
}

