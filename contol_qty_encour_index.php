<?php
header("content-Type: application/json");
require_once 'config.php';

$query = "SELECT DISTINCT pack_num, pack_qte FROM `p4_pack_operation`" ;
$rslt = $con->query($query) ;

$tab = [];
while ($item = $rslt->fetch_assoc()){
    $tab[] = $item;
}

$i = 0;
while (count($tab) >= $i) {
    $qengaged = $tab[$i]['pack_qte'] + $qengaged;
    $i++;
}

$query1 = "SELECT DISTINCT pack_num, qte_fp FROM `p12_control`" ;
$rslt1 = $con->query($query1) ;

$tab1 = [];
while ($item1 = $rslt1->fetch_assoc()){
    $tab1[] = $item1;
}
$i1 = 0;
while (count($tab1) >= $i1) {
    $qfab = $tab1[$i1]['qte_fp'] + $qfab;
    $i1++;
}

echo "\r\n Nombre des paaquets encours = ", count($tab) - count($tab1); //nombre des Paquets engagés

$qencours = $qengaged - $qfab;

echo " La Quantité encours = ", $qencours;