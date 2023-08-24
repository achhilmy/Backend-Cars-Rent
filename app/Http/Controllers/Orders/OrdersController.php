<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders\Orders;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::all();
        return [
            "response_msg" => "data berhasil di tampilkan",
            "response_code" => 200, 
            "data" => $orders,
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'pickUpLoc' =>'required',
            'dropOffLoc' =>'required',
           
        ]);
        $orders = new Orders([
            'pickUpLoc' => $request->get('pickUpLoc'),
            'dropOffLoc' => $request->get('dropOffLoc'),
            'pickUpDate' => $request->get('pickUpDate'),
            'dropOffDate' => $request->get('dropOffDate'),
            'pickUpTime' => $request->get('pickUpTime'),
            
        ]);
        echo($orders);
        $orders ->save();
        return [
            "response_msg" => "data berhasil di simpan",
            "response_code" => 200, 
            "data" => $orders,
        ]; 
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Orders::find($id);
        return [
            "response_msg" => "data berhasil di tampilkan",
            "response_code" => 200, 
            "data" => $orders,
        ];
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pickUpLoc' => 'required|string|max:255',
            'dropOffLoc' => 'required|string|max:255',
        ]);
        $orders = Orders::findOrFail($id);
        $orders->update($validatedData);
        return response()->json(['message' => 'Item updated successfully']);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the item by ID
        $orders = Orders::findOrFail($id);
        // Delete the item
        $orders->delete();
        return response()->json(['message' => 'Item deleted successfully']);
    }
}

