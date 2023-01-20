<?php
header("content-Type: application/json");
require_once 'config.php';

$query1 = "SELECT DISTINCT pack_num, qte_fp FROM `p12_control`" ;
$rslt1 = $con->query($query1) ;

$tab1 = [];
while ($item1 = $rslt1->fetch_assoc()){
    $tab1[] = $item1;
}

echo "\r\n Nombre des paaquets fabriqués = ", $T1 = count($tab1); //nombre des Paquets engagés

$i1 = 0;
$qfab = 0;
while ($T1 >= $i1) {
    $qfab = $tab1[$i1]['qte_fp'] + $qfab;
    $i1++;
}

echo " La Quantité Fabriquée = ", $qfab;
//echo json_encode($tab1);