<?php


echo '<h1> hello world </h1>';
include '../../private/Model/Class/Car.php';
include '../../private/Model/DAO/CarDAO.php';

// $peugo106 = new Car(1, '1-HRS-544', 500 ,'red');
// var_dump($peugo106);

$DAO = new carDAO;

echo "<h2> FETCH </h2>";
$car = $DAO->fetch(1);
var_dump($car);

echo "<h2> FETCH ALL </h2>";
$cars = $DAO->fetchAll();
var_dump($cars);

echo "<h2> INSERT </h2>";
$new = array('Voiture_Chassis' => '1-JDE-544', 'Voiture_Puissance' => 9000, 'Voiture_Couleur' => 'Rouge');
// $new2 = array('Voiture_ID' => 1, '1-JDE-544', 'Voiture_Puissance' => 9000, 'Voiture_Couleur' => 'Rouge');
// $new3 = array('1-JDE-544', 9000, 'Rouge');

$newCar = $DAO->insert($new);
var_dump($newCar);

?>