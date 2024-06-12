<?php
function db_gericht_hat_allergen_select_all() {
    $link = connectdb();

    $sql3 = 'SELECT code, gericht_id FROM gericht_hat_allergen';
    $result3 = mysqli_query($link, $sql3);

    $data3 = mysqli_fetch_all($result3, MYSQLI_BOTH);

    mysqli_close($link);
    return $data3;
}

