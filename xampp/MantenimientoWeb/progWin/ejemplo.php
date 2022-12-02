<?php

$cont=0;
$comando = "WMIC BIOS Get SerialNumber";
exec($comando, $salida, $codigoSalida);
echo "\n";
echo "\n";
echo "\n";
foreach($salida as $linea){
    echo "\n";
    echo "\n";
    echo "\n";
    $cont++;;
    if($cont==2){
        echo "--ServiceTag: ",$linea;
    }
}

$cont=0;
$comando3 = "wmic computersystem get manufacturer";
exec($comando3, $salida3, $codigoSalida);
echo "\n";
echo "\n";
echo "\n";
foreach($salida3 as $linea3){
    echo "\n";
    echo "\n";
    echo "\n";
    $cont++;
    if($cont==2){
        echo "--Marca: ",$linea3;
    }
}


$cont=0;
$comando2 = "wmic csproduct get name";
exec($comando2, $salida2, $codigoSalida);
echo "\n";
echo "\n";
echo "\n";
foreach($salida2 as $linea2){
    echo "\n";
    echo "\n";
    echo "\n";
    $cont++;
    if($cont==2){
        echo "--Modelo: ",$linea2;
    }
}


$cont=0;
$comando4 = "wmic MemoryChip get Capacity";
exec($comando4, $salida4, $codigoSalida);
echo "\n";
echo "\n";
echo "\n";
foreach($salida4 as $linea4){
    echo "\n";
    echo "\n";
    echo "\n";
    $cont++;
    if($cont==2){
        $resultado = substr($linea4, 0, 1);
        echo "--Ram: ",$resultado," GB";
    }


}
#wmic cpu get name

$cont=0;
$comando5 = "wmic cpu get name";
exec($comando5, $salida5, $codigoSalida);
echo "\n";
echo "\n";
echo "\n";
foreach($salida5 as $linea5){
    echo "\n";
    echo "\n";
    echo "\n";
    $cont++;
    if($cont==2){
        echo "--Procesador: ",$linea5 , "\n";
    }


}

$cont=0;
$comando6 = "wmic diskdrive get size";
exec($comando6, $salida6, $codigoSalida);
echo "\n";
echo "\n";
echo "\n";
foreach($salida6 as $linea6){
    echo "\n";
    echo "\n";
    echo "\n";
    $cont++;
    if($cont==2){

        $gibibytes = round($linea6 / 1024 / 1024 / 1024,4);

        echo "--Almacenamiento: ", substr($gibibytes, 0, 3), "GB";
    }


}




#PowerShell "Get-PhysicalDisk | Format-Table -AutoSize"
$cont=0;
$comando7 = 'PowerShell "Get-PhysicalDisk | Format-Table -AutoSize"';
exec($comando7, $salida7, $codigoSalida);
echo "\n";
echo "\n";
echo "\n";
foreach($salida7 as $linea7){
    echo "\n";
    echo "\n";
    echo "\n";
    $cont++;
    $pos = strpos($linea7, "HDD");
  
    if ($pos === false) {
        
    } else {
        echo "--tipo de disco: HDD";
    }

    $pos1 = strpos($linea7, "SSD");
  
    if ($pos1 === false) {
        
    } else {
        echo "--tipo de disco: SSD";
    }
    



}
?>