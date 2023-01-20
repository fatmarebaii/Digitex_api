<?php
header("content-Type: application/json");
require_once 'config.php';

$query = "SELECT DISTINCT operator_reg_num, performance, prod_line FROM `p8_op_performance_h`" ;
$rslt= $con->query($query) ;

$tab = [];
while ($item = $rslt->fetch_assoc()){
    $tab[] = $item;
}

echo "\r\n Nombre totale des opératrices dans le site = ", $T = count($tab); //nombre des Paquets engagés

$i = 0;
$performanceAtelier = 0;
while ($T >= $i) {
    $performanceAtelier = $tab[$i]['performance'] + $performanceAtelier;
    $i++;
}
$moyperf=$performanceAtelier/$T;

echo " Performance par Atelier = ", number_format($moyperf, 2);

//Performance par chaine
$query3 = "SELECT DISTINCT prod_line FROM `p8_op_performance_h`" ;
$rslt3= $con->query($query3) ;
$tab3 = [];
while ($item3 = $rslt3->fetch_assoc()){
    $tab3[] = $item3;
}

echo "Nombre des Chaines en marche = ", count($tab3);
echo json_encode($tab3);

$k = 0;
while (count($tab3) >= $k) {

    $ch = $tab3[$k];
    $query4= "SELECT DISTINCT operator_reg_num, performance, prod_line FROM `p8_op_performance_h` WHERE prod_line = $ch" ;
    $rslt4= $con->query($query4) ;

    $tab4 = [];
    while ($item4 = $rslt->fetch_assoc()){
        $tab4[] = $item4;
    }

    echo "Dans cette Chaine il y'a", $P = count($tab4), "opératrices";
    $j = 0;
    $performancechaine = 0;
    while ($P >= $j) {
    $performancechaine = $tab4[$i]['performance'] + $performanceChaine;
    $j++;
    }
    $perfchaine=$performancechaine/$P;
    echo " Performance par Atelier = ", number_format($perfchaine, 2);
}