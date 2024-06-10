<?php
/**
 * Praktikum DBWT. Autoren:
 * Amelie, Petersen, 3661323
 * Nele, Mikkelsen, 3650167
 */
?>

<?php
echo "Erstes PHP-Skript <br>";
phpinfo();

?>

<?php
class Besucher {
    private $name;
    public function __construct() {
        $this->name = "unbekannt";
    }
    public function getName(){#private Da man dass dann eh in getLabeledName ändert
        return $this->name;
    }
    private function setName($name){
        return $this->name = $name;
    }
    public function getLabeledName (){
        echo "Name:". $this->name;
    }
}

