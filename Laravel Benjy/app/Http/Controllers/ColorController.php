<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Car;
use Illuminate\Http\Request;

class ColorController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $colors = Color::all();
        return view('colors.list', ['colors' => $colors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $cars = Car::all();
        return view('colors.form', ['cars' => $cars]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $color = new Color();
        $color->name = $request->has('name') && strlen($request->name) ? $request->name : "Nom non spécifié";

        // $color->hex = $request->has('hex') && strlen($request->hex) ? $request->hex : "#000000";
        if ($request->has('hex') && strlen($request->hex)) {
            $regex = "/#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})\$/";
            if (preg_match($regex, $request->hex)) {
                echo 'coucou';
                $color->hex = $request->hex;
            } else {
                goto error;
            }
        } else {
            error:
            $color->hex = "#000";
        }

        $cars = Car::find($request->cars);

        //je save ici pour connaitre l'id de la couleur, sans son id, impossible de l'injecter chez les voitures choisies
        $color->save();
        if ($cars) {
            $color->cars()->saveMany($cars);
            $color->save();
        }

        return redirect('/colors/' . $color->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color){
        return view('colors.one', ['color' => $color]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color){
        $cars = Car::all();
        return view('colors.form', ['color' => $color, 'cars' => $cars]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color){
        $color->name = $request->has('name') && strlen($request->name) ? $request->name : $color->name;
        $color->hex = $request->has('hex') && strlen($request->hex) ? $request->hex : $color->hex;

        $cars = Car::find($request->cars);
        if ($cars) {
            $color->cars()->saveMany($cars);
        }

        $color->save();
        return redirect('/colors/' . $color->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color){
        $color->delete();
        return redirect('/colors');
    }
}
