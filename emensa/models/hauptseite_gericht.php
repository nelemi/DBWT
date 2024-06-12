
<?php
    function db_gericht_select_all() {
        $link = connectdb();

        $sql1 = 'SELECT id, name, beschreibung, preisintern, preisextern FROM gericht';
        $result1 = mysqli_query($link, $sql1);

        $data1 = mysqli_fetch_all($result1, MYSQLI_BOTH);

        mysqli_close($link);
        return $data1;
    }
