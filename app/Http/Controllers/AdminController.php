<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::all();

        return response()->json([
            "message" => "Load success",
            "data" => $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "product_name"=>['required'],
            "description"=>['required'],
            "price_tag"=>['required']
        ]);
        Produk::create($data);

        $data_akhir = Produk::all();
        return response()->json([
            "message" => "Store success",
            "data" => $data_akhir
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$data=Produk::where('id', $request->id)->get();
        $data=Produk::find($id);
        //$data = Produk::select('title', $title);
        if($data)
        {
            return $data;
        }

        else
        {
            return ["message" => "Data Not Found"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = Produk::find($id);
        if($data){
            $data->product_name = $request->product_name ? $request->product_name : $data->product_name;
            $data->description = $request->description ? $request->description : $data->description;
            $data->price_tag = $request->price_tag ? $request->price_tag : $data->price_tag;
            $data->save();

            return response()->json([
                "message" => "Update Success",
                "data" => $data
            ], 202);
        }
        else{
            return ["message" => "Data Not Found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produk::find($id);
        if($data)
        {
            $data = Produk::destroy($id);
            return response()->json([
                "message" => "Delete Success",
            ], 203);
        }else{
            return ["message" => "Data Not Found"];
        }
    }
}
