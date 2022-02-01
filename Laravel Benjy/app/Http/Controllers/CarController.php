<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Color;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.list', ['cars'=>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //je dois récupérer l'ensemble des couleurs pour permettre de les montrer dans le formulaire
        $colors = Color::all();
        return view('cars.form', ['colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car();
        $car->power = $request->has('power') && strlen($request->power) ? $request->power : "Puissance non spécifiée";
        $car->serial = $request->has('serial') && strlen($request->serial) ? $request->serial : "Numéro de série non spécifiée";
        
        //au lieu de faire $car->color = $request->color, j'attribue une relation
        //d'abbord je récupere la couleur
        $color = Color::find($request->color_id);
        if ($color) {
            //si j'ai bien trouvé une couleur alors j'associe la couleur à la voiture
            $car->color()->associate($color);
        } else {

            $colors = Color::all();
                    
            if(count($colors)){
                $car->color()->associate($colors[0]);
            }else{   
                $color = new Color();
                $color->name = "black";
                $color->hex = "#000";
            
                $color->save();
                $car->color()->associate($color);
            }

        }
        
        $car->save();
        return redirect('/cars/'.$car->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('cars.one', ["car"=>$car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $colors = Color::all();
        return view('cars.form', ['car'=>$car, 'colors'=>$colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $car->power = $request->has('power') && strlen($request->power) ? $request->power : $car->power;
        $car->serial = $request->has('serial') && strlen($request->serial) ? $request->serial : $car->serial;
        $color = Color::find($request->color_id);
        if ($color) {
            $car->color()->associate($color);
        }
        $car->save();
        return redirect('/cars/'.$car->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect('/cars');
    }
}
