<?php


echo 'hello world';
include '../../private/Model/Class/Car.php';
include '../../private/Model/DAO/CarDAO.php';

// $peugo106 = new Car(1, '1-HRS-544', 500 ,'red');
// var_dump($peugo106);

$DAO = new carDAO;
var_dump($DAO->fetch(1));

$DAO2 = new carDAO;
var_dump($DAO2->fetchAll());


?>