<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bestellingen;
use Illuminate\Support\Facades\Auth;

class BestellingHistorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['Bestellingen']= bestellingen::select("created_at","id")->where('user_id',Auth::user()->id)->groupBy('Created_at')->get();
        return view('Bestelling.Bestelling_overzicht',$data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data["Bestelling"] = Bestellingen::select('products.*', 'bestellingen.aantal', 'bestellingen.product_id')
        ->join('products', 'product_id', '=', 'products.id')
        ->where([['bestellingen.user_id', '=', Auth::user()->id],['bestellingen.created_at',$request->time]])
        ->get();

        $totaalprijs = 0;
        foreach($data["Bestelling"] as $productprijs){
            $tempprice = $productprijs->aantal * $productprijs->product_prijs;
            $totaalprijs += $tempprice;
        }
        $totaalprijs = number_format((float)$totaalprijs, 2, '.', '');   
        $data["totaalprijs"] = $totaalprijs;
        return view('Bestelling.Bestelling_info',$data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
