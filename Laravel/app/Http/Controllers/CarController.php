<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index(){
        $cars = Car::all();
        return view('cars.list', ['cars'=>$cars]);
    }

    public function create(){
        return view('cars.create');
    }

    public function insert(Request $request){
         //$request->serial;
         //creer un nouvel objet
         //assigner les valeurs
         //utiliser la methode save()
         //$car->save()
    $serialError = $powerError = $colorError = "";

    if(!empty($_POST)) 
    {
        $serial = checkInput($_POST['serial']);
        $power  = checkInput($_POST['power']);
        $color  = checkInput($_POST['color']);
        
        if(empty($serial)) 
        {
            $serialError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(empty($power)) 
        {
            $powerError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 

        if(empty($color)) 
        {
            $colorError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 

        if($isSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO items (Car_Serial, Car_Color, Car_Power) values(?, ?, ?)");
            $statement->execute(array($serial,$color,$power));
            Database::disconnect();

            header("Location: /cars/list");
        }
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    }
}
