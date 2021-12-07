<?php


echo '<h1> hello world </h1>';
include '../../private/Model/Class/Car.php';
include '../../private/Model/DAO/CarDAO.php';

include '../../private/Model/Class/seller.php';
include '../../private/Model/DAO/sellerDAO.php';

$peugo106 = new Car(1, '1-HRS-544', 500 ,'red');
var_dump($peugo106);

$DAO = new carDAO;

echo "<h2> FETCH </h2>";
$car = $DAO->fetch(1);
var_dump($car);

echo "<h2> FETCH ALL </h2>";
$cars = $DAO->fetchAll();
var_dump($cars);

echo "<h2> INSERT </h2>";
$new = array('Voiture_Chassis' => '1-JDE-544', 'Voiture_Puissance' => 9000, 'Voiture_Couleur' => 'Rouge');
$newCar = $DAO->insert($new);
var_dump($newCar);

echo "<h2> UPDATE </h2>";
$up = array('Voiture_Chassis' => '1-JDE-568', 'Voiture_Puissance' => 1, 'Voiture_Couleur' => 'blue');
$update = $DAO->update(10, $up);
var_dump($update);

echo "<h1> SELLER </h1>";

$DAO2 = new sellerDAO;

echo "<h2> FETCH SELLER </h2>";
$seller = $DAO2->fetch(1);
var_dump($seller);

echo "<h2> FETCH ALL SELLER </h2>";
$sellers = $DAO2->fetchAll();
var_dump($sellers);

echo "<h2> INSERT SELLER </h2>";
$new = array('Vendeur_Name' => 'Windows', 'Vendeur_FirstName' => 'Linux', 'Vendeur_Bday' => '2021-12-24');
$newSeller = $DAO2->insert($new);
var_dump($newSeller);

echo "<h2> UPDATE SELLER </h2>";
$up = array('Vendeur_Name' => 'Audric', 'Vendeur_FirstName' => 'Rosier', 'Vendeur_Bday' => '2021-12-24');
$update = $DAO2->update(2, $up);
var_dump($update);

?>