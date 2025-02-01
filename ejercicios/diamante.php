<?php
    function imprimirDiamante($tamano) {
        if (!is_numeric($tamano) || $tamano <= 0) {
            echo "Por favor, ingrese un numero positivo como argumento.";
            return;
        }

        for ($i = 1; $i <= $tamano; $i++) {
            echo str_repeat(" ", $tamano - $i);
    
            echo str_repeat("* ",  $i);
    
            echo "\n";
        }
    
        for ($i = $tamano - 1; $i >= 1; $i--) {
            echo str_repeat(" ", $tamano - $i);
    
            echo str_repeat("* ", $i);
    
            echo "\n";
        }
    }

    if(isset($argv[1])) {
        $tamano = intval($argv[1]);
        imprimirDiamante($tamano);
    } else {
        echo "Por favor, ingrese un numero como argumento.";
    };
?>
