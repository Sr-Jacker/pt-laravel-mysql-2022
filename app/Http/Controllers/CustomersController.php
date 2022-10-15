<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * index para mostrar
     * store para guardar
     * update para actualizar
     * destroy para eliminar
     */
    public function store(Request $request){

        $request->validate([
            'customer_id_number'=>'required|min:1',
            'customer_name'=>'required|min:1',
            'customer_birth_date'=>'required',
            'customer_address'=>'required|min:1',
            'customer_phone'=>'required|min:1'
        ]);

        $customer=new Customer();
        $customer->customer_id_number=$request->customer_id_number;
        $customer->customer_name=$request->customer_name;
        $customer->customer_birth_date=$request->customer_birth_date;
        $customer->customer_address=$request->customer_address;
        $customer->customer_phone=$request->customer_phone;

        $customer->save();

        return redirect()->route('customers')->with('success', 'Customer agregado correctamente');


    }

    public function index(){
        $customers= Customer::all();
        return view('customers',['customers'=> $customers]);
    }

    public function show($id){
        $customer= Customer::find($id);
        return view('showCustomers',['customer'=> $customer]);
    }

    public function update(Request $request, $id){
        $customer= Customer::find($id);
        $customer->customer_id_number=$request->customer_id_number;
        $customer->customer_name=$request->customer_name;
        $customer->customer_birth_date=$request->customer_birth_date;
        $customer->customer_address=$request->customer_address;
        $customer->customer_phone=$request->customer_phone;


        $customer->save();

        return redirect()->route('customers')->with('update-success', 'Customer actualizado correctamente');

    }

    public function destroy($id){
        $customer= Customer::find($id);
        $customer->delete();
        return redirect()->route('customers')->with('update-success', 'Customer eliminado correctamente');
    }
}
