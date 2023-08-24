<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cars\Cars;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Cars::all();
        return [
            "response_msg" => "data berhasil di tampilkan",
            "response_code" => 200, 
            "data" => $cars,
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
            'carType' =>'required',
            'name' =>'required',
            'fuel' =>'required',
        ]);
        $cars = new Cars([
            'name' => $request->get('name'),
            'carType' => $request->get('carType'),
            'rating' => $request->get('rating'),
            'fuel' => $request->get('fuel'),
            'image' => $request->get('image'),
            'hourRate' => $request->get('hourRate'),
            'dayRate' => $request->get('dayRate'),
            'monthRate' => $request->get('monthRate'),

        ]);
        echo($cars);
        $cars ->save();
        return [
            "response_msg" => "data berhasil di simpan",
            "response_code" => 200, 
            "data" => $cars,
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
        $cars = Cars::find($id);
        return [
            "response_msg" => "data berhasil di tampilkan",
            "response_code" => 200, 
            "data" => $cars,
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
            'name' => 'required|string|max:255',
            'carType' => 'nullable|string',
        ]);
        $cars = Cars::findOrFail($id);
        $cars->update($validatedData);
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
        $cars = Cars::findOrFail($id);
        // Delete the item
        $cars->delete();
        return response()->json(['message' => 'Item deleted successfully']);
    }
}

