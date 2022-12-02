<?php 

$array_string = [];
$array_string1 = [];

if ($file = fopen("logPC.txt", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        $array_string[]= $line;
       
    }

    echo "ServiceTag: ",$array_string[1];
    echo "Marca: ",$array_string[3];
    echo "Modelo: ",$array_string[5];
    $cadena_formateada = trim($array_string[7]);
    echo "RAM: ", $cadena_formateada, " Byte";
    echo " Procesador: ", $array_string[9];
    $cadena_formateada1 = trim($array_string[11]);
    echo "Tamaño Disco: ",  $cadena_formateada1, " Byte";

   
    fclose($file);
}


if ($file = fopen("infoExtraPC.txt", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        $array_string1[]= $line;
    }

    echo "HostName: ",$array_string1[0];
    echo "IP: ",$array_string1[1];
    echo "MACADDRESS: ",$array_string1[5];
    fclose($file);
}


?> 