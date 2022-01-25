<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.list', ['cars' => $cars]);
    }

    public function create()
    {
        return view('cars.create');
    }

    public function insert(Request $request)
    {
        //$request->serial;
        //creer un nouvel objet
        //assigner les valeurs
        //utiliser la methode save()
        //$car->save()
        $serialError = $powerError = $colorError = "";
    }
}
