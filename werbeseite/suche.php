<?php
$programmingLanguages = ['PHP', 'C++','Java','C','Python'];
$search = null;
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
foreach ($programmingLanguages as $language) {
    if ($language == $search) {
        echo 'gefunden';
    }
}
?>