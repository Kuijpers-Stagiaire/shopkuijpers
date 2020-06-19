<?php

namespace App\Http\Controllers;

use DateTime;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;

class GebruikerSysteemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['UserInfo'] = Auth::user();
        return view('users.profile', $data);
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
    public function show($id)
    {
        //
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
        if($request->hasFile('avatar')) {
            $filename = 'avatar_user' . Auth::user()->id . '.jpeg';
            $request->file('avatar')->storeAs('public/avatars', $filename);
            User::where('id',$id)->update(['name'=>$request->voornaam,'achternaam'=>$request->achternaam,'locatie'=>$request->locatie,'functie'=>$request->functie,'tel1'=>$request->tel1,'tel2'=>$request->tel1,'email'=>$request->email,'avatar'=>$filename]);
        }
        else{
            User::where('id',$id)->update(['name'=>$request->voornaam,'achternaam'=>$request->achternaam,'locatie'=>$request->locatie,'functie'=>$request->functie,'tel1'=>$request->tel1,'tel2'=>$request->tel1,'email'=>$request->email]);
        }

        return redirect()->back()->with('succes', 'gebruiker is succesvol opgeslagen');

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
