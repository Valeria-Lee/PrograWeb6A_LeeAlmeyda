<?php
    function jugarPartida($p1, $p2) {
        echo "Movimiento del jugador 1: " . $p1 . "\n";
        echo "Movimiento del jugador 2: " . $p2 . "\n";

        $mov_ganar = [
            0 => [2,3],
            1 => [0,4],
            2 => [1,3],
            3 => [1,4],
            4 => [0,2],
        ];

        $mov_validos = [0,1,2,3,4];

        if (in_array($p2, $mov_ganar[$p1])) {
            echo "Gano el jugador 1.\n";
        } else {
            if (in_array($p1, $mov_ganar[$p2])) {
                echo "Gano el jugador 2.\n";
            }
        }
        
    }

    if (isset($argv[1]) && isset($argv[2])) {
        $p1 = intval($argv[1]);
        $p2 = intval($argv[2]);

        jugarPartida($p1, $p2);
    }
?>