<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(){
        $sellers = Seller::all(); //recupere tous nos vendeurs
        return view('sellers.list', ['sellers'=>$sellers]);
        // On renvoie la vue sellers.list avec la variable sellers qui contient nos vendeurs
    }

    public function insert(){

        $name = $_POST["name"];
        $first = $_POST["firstname"];
        $age = $_POST["age"];

        $sellpush = new Seller();
        $sellpush->nom = $name;
        $sellpush->prenom = $first;
        $sellpush->age = $age;

        $sellpush->save();

        return view('sellers.formSeller');
    }
}