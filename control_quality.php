<?php
header("content-Type: application/json");
require_once 'config.php';

$query2 = "SELECT DISTINCT pack_num, qte_fp, qte_df, qte FROM `p12_control` WHERE qte_df<>0; " ;
$rslt2 = $con->query($query2) ;

$tab2 = [];
while ($item2 = $rslt2->fetch_assoc()){
    $tab2[] = $item2;
}

echo "\r\n Nombre des paaquets ayant des défauts = ", count($tab2); //nombre des Paquets engagés

$i2 = 0;
$qdf = 0;
while (count($tab2) >= $i2) {
    $qdf = $tab2[$i2]['qte_df'] + $qdf;
    $i2++;
}

$query1 = "SELECT DISTINCT pack_num, qte_fp FROM `p12_control`" ;
$rslt1 = $con->query($query1) ;

$tab1 = [];
while ($item1 = $rslt1->fetch_assoc()){
    $tab1[] = $item1;
}
$i1 = 0;
$qfab = 0;
while (count($tab1) >= $i1) {
    $qfab = $tab1[$i1]['qte_fp'] + $qfab;
    $i1++;
}
echo " Quantité défaillante=", $qdf, "Quantité fabriquée =", $qfab;
$cq = ($qdf / $qfab)*100 ;
echo " Indice de controle qualité = ", number_format($cq,2), "%" ;