<?php
function db_allergen_select_all() {
    $link = connectdb();

    $sql2 = 'SELECT code, name FROM allergen';
    $result2 = mysqli_query($link, $sql2);

    $data2 = mysqli_fetch_all($result2, MYSQLI_BOTH);

    mysqli_close($link);
    return $data2;
}
