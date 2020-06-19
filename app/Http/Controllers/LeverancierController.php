<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leverancier;

class LeverancierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['leveranciers'] = leverancier::all();
        // dd($data);
        return view('leveranciers.leverancier_overzicht', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Leveranciers.leverancier_toevoegen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bedrijfsnaam'=>'required',
            'bedrijfsadres'=>'required',
            'postcode'=>'required',
            'bedrijfplaats'=>'required',
            'telefoonnr'=>'required',
            'acm_naam'=>'required',
            'acm_telnr'=>'required',
            'acm_email'=>'required',
            'inkoopvoorwaarden'=>'mimes:pdf,xlx,csv|max:2048',
            'cps_naam'=>'required',
            'cpsupp_naam'=>'required',
            'email_sales'=>'required',
            'email_support'=>'required',

        ]);

        //Uploaden van een bestand(.pdf inkoopvoorwaarden)
        $fileName = $request->bedrijfsnaam . "_inkoopvoorwaarden.pdf";
        $file = $request->file('inkoopvoorwaarden');
        $file->storeAs('public/photos',$fileName);
  
        //Uploaden van fotobestand(leverancierprofielfoto)
        $PhotoMame = $request->bedrijfsnaam . "_inkoopvoorwaarden.pdf";
        $file = $request->file('Bedrijf_foto');
        $file->storeAs('public/inkoopvoorwaardens',$PhotoMame);

        $leverancier = new Leverancier([
            'Bedrijf_foto' => $request->get('Bedrijf_foto'),
            
            'Bedrijf_naam' => $request->get('bedrijfsnaam'),
            'Bedrijf_adres' => $request->get('bedrijfsadres'),
            'Bedrijf_postcode' => $request->get('postcode'),
            'Bedrijf_plaats' => $request->get('bedrijfplaats'),
            'Bedrijf_telefoonnr' => $request->get('telefoonnr'),
            'Accountmanager_naam' => $request->get('acm_naam'),
            'Accountmanager_telefoonnr' => $request->get('acm_telnr'),
            'Accountmanager_email' => $request->get('acm_email'),

            'Accountmanager_inkoopvoorwaarden' => $request->get('inkoopvoorwaarden'),

            'Accountmanager_Algemeneinfo' => $request->get('algmn_info'),
            'Contactpersoon_sales' => $request->get('cps_naam'),
            'Contactpersoon_support' => $request->get('cpsupp_naam'),
            'Sales_emailorders' => $request->get('email_sales'),
            'Sales_support' => $request->get('email_support'),
            'Vrij_veld' => $request->get('extr_info')
        ]);
        $leverancier->save();
        return redirect('/leveranciers')->with('success', 'Leverancier toegevoegd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['leverancier'] = Leverancier::findOrFail($id);
        dd($data);
        return view('Leveranciers.leverancier_detail', $data);
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
