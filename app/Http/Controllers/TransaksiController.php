<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::all();

        return response()->json([
            "message" => "Load success",
            "data" => $data
        ], 200);
    }

    public function indexResult()
    {
        //$transaksi= Transaksi::pluck('transaction_id')->toArray();
        //$transaksi_result= Transaksi::pluck('payment_result')->toArray();
        $transaksi_result= Transaksi::select('transaction_id','payment_result')->get()->toArray();


        return response()->json([
            "message" => "Load success",
            "data" => $transaksi_result
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
            "payment_price"=>['required'],
        ]);
        Transaksi::create($data);

        $data_akhir = Transaksi::all();
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
        $data=Transaksi::find($id);
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

    public function showResult($id)
    {
        $data=Transaksi::find($id)->value('payment_result');
        //$data = Produk::select('title', $title);
        if($data)
        {
            return ["payment_result" => $data];
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
    public function updateResult(Request $request, $id)
    {
        $data = Transaksi::find($id);
        if($data){
            $data->payment_result = $request->payment_result ? $request->payment_result : $data->payment_result;
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
        
    }
}
