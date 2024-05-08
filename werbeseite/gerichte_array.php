<?php

$gerichte_array = [ ["Rindfleisch mit Bambus, Kaiserschoten 
                    und rotem Paprika, dazu Mie Nudeln"],
                    ["Spinatrisotto mit kleinen Samasateigecken 
                    und gemischtem Salat"]
    ];

function gerichte ($gerichte_array, $gericht = 0) {
        if (isset($gerichte_array[$gericht]))
        $ger_array = $gerichte_array[$gericht];{

        }return $ger_array[$gericht];
}
echo gerichte($gerichte_array);

