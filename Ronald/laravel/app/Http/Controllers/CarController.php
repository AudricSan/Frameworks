<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index(){
        $cars = Car::all(); //recupere toutes nos voitures
        return view('cars.list', ['cars'=>$cars]);
        // On renvoie le vue cars.list avec la variable cars qui contient nos voitures
    }

    public function insert(){

        $ser = $_POST["serial"];
        $col = $_POST["color"];
        $pow = $_POST["power"];

        $carpush = new Car();
        $carpush->serial = $ser;
        $carpush->color = $col;
        $carpush->power = $pow;

        $carpush->save();

        return view('cars.formulaire');
    }

}
