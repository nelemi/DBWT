<?php
;
function gerichte ($gericht = 0) : string {
    $gerichte_array = ["Rindfleisch mit Bambus, Kaiserschoten 
                    und rotem Paprika, dazu Mie Nudeln",
        "Spinatrisotto mit kleinen Samasateigecken 
                    und gemischtem Salat",
        "Frische Tortelloni mit Ziegenkäse-Zitronen-
                    Füllung auf grünem Spargel, verfeinert mit
                    karamellisierten Walnüssen",
        "Belgische Waffeln mit feiner Schokoladensauce, 
                    saisonalen Früchten und einer Kugel hausgemachtem 
                    Vanilleeis"
    ];
        if (array_key_exists($gericht, $gerichte_array)) {
            return $gerichte_array[$gericht];
            } else {
            return $gerichte_array[0];
        }
}
$gerichte_array = ["Rindfleisch mit Bambus, Kaiserschoten 
                    und rotem Paprika, dazu Mie Nudeln",
    "Spinatrisotto mit kleinen Samasateigecken 
                    und gemischtem Salat",
    "Frische Tortelloni mit Ziegenkäse-Zitronen-
                    Füllung auf grünem Spargel, verfeinert mit
                    karamellisierten Walnüssen",
    "Belgische Waffeln mit feiner Schokoladensauce, 
                    saisonalen Früchten und einer Kugel hausgemachtem 
                    Vanilleeis"
];

$anzahl_gerichte = count($gerichte_array);








//function gerichte ($gericht = 0) : string {
    //$gerichte_array = [["Rindfleisch mit Bambus, Kaiserschoten
          //          und rotem Paprika, dazu Mie Nudeln"],
        //["Spinatrisotto mit kleinen Samasateigecken
          //          und gemischtem Salat"]];
    //if (isset($gerichte_array[$gericht])) {
      //  $ger_array = $gerichte_array[$gericht];
    //}return $ger_array;
//}
//echo gerichte();
