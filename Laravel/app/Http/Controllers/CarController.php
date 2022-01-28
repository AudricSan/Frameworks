<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Symfony\Component\VarDumper\VarDumper;

class CarController extends Controller
{
    public function index(){
        $cars = Car::all(); //recupere toutes nos voitures
        return view('cars.list', ['cars'=>$cars]);
        // On renvoie le vue cars.list avec la variable cars qui contient nos voitures
    }

    public function insert(Request $request){

       $car = new Car();

        if ($request->has('serial') && strlen($request->serial)){
            $car->Car_Serial = $request->serial;
        } else {
            $car->Car_Serial = false;
        }
        
        if ($request->has('color') && strlen($request->color)){
            $car->Car_Color = $request->color;
        } else {
            $car->Car_Color = false;
        }
        
        if ($request->has('power') && strlen($request->power)){
            $car->Car_Power = $request->power;
        } else {
            $car->Car_Power = false;
        }

        if($car->Car_Power === false || $car->Car_Color === false || $car->Car_Serial === false ){
            $error = 'Miss Data';
            // var_dump($car->Car_Power);
            // var_dump($car->Car_Color);
            // var_dump($car->Car_Serial);
            return redirect('/cars/form');
        }else{
            $car->save();
            return redirect('/cars');
        }

    }
}