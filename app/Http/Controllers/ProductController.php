<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * index para mostrar
     * store para guardar
     * update para actualizar
     * destroy para eliminar
     */
    public function store(Request $request){

        $request->validate([
            'product_description'=>'required|min:1',
            'product_amount'=>'required|min:1',
            'product_value'=>'required|min:1',
            'product_status'=>'required|min:1',
        ]);

        $producto=new Producto();
        $producto->product_description=$request->product_description;
        $producto->product_amount=$request->product_amount;
        $producto->product_value=$request->product_value;
        $producto->product_status=$request->product_status;

        $producto->save();

        return redirect()->route('productos')->with('success', 'Producto agregado correctamente');


    }

    public function index(){
        $productos= Producto::all();
        return view('productos',['productos'=> $productos]);
    }

    public function show($id){
        $producto= Producto::find($id);
        return view('showProductos',['producto'=> $producto]);
    }

    public function update(Request $request, $id){
        $producto= Producto::find($id);
        $producto->product_description=$request->product_description;
        $producto->product_amount=$request->product_amount;
        $producto->product_value=$request->product_value;
        $producto->product_status=$request->product_status;

        $producto->save();

        return redirect()->route('productos')->with('update-success', 'Producto actualizado correctamente');

    }

    public function destroy($id){
        $producto= Producto::find($id);
        $producto->delete();
        return redirect()->route('productos')->with('update-success', 'Producto eliminado correctamente');
    }
}
