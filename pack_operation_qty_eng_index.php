<?php
header("content-Type: application/json");
require_once 'config.php';

$query = "SELECT DISTINCT pack_num, pack_qte FROM `p4_pack_operation`" ;
$rslt = $con->query($query) ;

$tab = [];
while ($item = $rslt->fetch_assoc()){
    $tab[] = $item;
}

echo "\r\n Nombre des paaquets engagés = ", $T = count($tab); //nombre des Paquets engagés

$i = 0;
$qengaged = 0;
while ($T >= $i) {
    $qengaged = $tab[$i]['pack_qte'] + $qengaged;
    $i++;
}

echo " La Quantité Engagée = ", $qengaged;
//echo json_encode($tab);