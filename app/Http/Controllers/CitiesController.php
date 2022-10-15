<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * index para mostrar
     * store para guardar
     * update para actualizar
     * destroy para eliminar
     */
    public function store(Request $request){

        $request->validate([
            'city_name'=>'required|min:1'
        ]);

        $city=new City();
        $city->city_name=$request->city_name;

        $city->save();

        return redirect()->route('cities')->with('success', 'Ciudad agregada correctamente');


    }

    public function index(){
        $cities= City::all();
        return view('cities',['cities'=> $cities]);
    }

    public function show($id){
        $city= City::find($id);
        return view('showCities',['city'=> $city]);
    }

    public function update(Request $request, $id){
        $city= City::find($id);
        $city->city_name=$request->city_name;

        $city->save();

        return redirect()->route('cities')->with('update-success', 'Ciudad actualizada correctamente');

    }

    public function destroy($id){
        $city= City::find($id);
        $city->delete();
        return redirect()->route('cities')->with('update-success', 'Ciudad eliminada correctamente');
    }
}
