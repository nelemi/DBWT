<?php

function alle_gerichte () {
    return ["Rindfleisch mit Bambus, Kaiserschoten 
                    und rotem Paprika, dazu Mie Nudeln",
        "Spinatrisotto mit kleinen Samasateigecken 
                    und gemischtem Salat",
        "Frische Tortelloni mit Ziegenkäse-Zitronen-
                    Füllung auf grünem Spargel, verfeinert mit
                    karamellisierten Walnüssen",
        "Belgische Waffeln mit feiner Schokoladensauce, 
                    saisonalen Früchten und einer Kugel hausgemachtem 
                    Vanilleeis"];
}

function gerichte ($gericht = 0) : string {
    if (array_key_exists($gericht, alle_gerichte())) {
            return alle_gerichte()[$gericht];
            } else {
            return alle_gerichte()[0];
        }
}

$anzahl_gerichte = count(alle_gerichte());





