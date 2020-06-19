<?php
namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        foreach($products as $product){
            $array = unserialize( $product->product_extra_informatie);
            $product['productextrainfo'] = $array;
            if($product->image != "DefaultProductImage.jpg"){
                $photoarray = unserialize($product->image);
                $product['productimages'] = array_values($photoarray)[0];
            }
            else{
                $photoarray = $product->image;
                $product['productimages'] = $photoarray;
            }
            
        }
        return view('Producten.productdesign', compact('products'));
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
    $this->validate($request, [
        'photos'=>'required',
    ]);
        $sstring = array();
        for ($i=1; $i <= 4; $i++) {
            if ($request->input('extra_info_'.$i) != null){
                array_push($sstring, $request->input('extra_info_'.$i));
            }
        }
        $PhotoString = array();
        if($request->hasFile('photos'))
        {
                $i = 1;
                $allowedfileExtension=['pdf','jpg','png','docx'];
                $files = $request->file('photos');
                
                foreach($files as $file){
                    // $filename = $file->getClientOriginalName();
                    $filename = 'product_foto_'.$request->prd_naam.'_'.time().'_'.$i.'.'.$file->getClientOriginalExtension();
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);
                    if($check)
                    {
                        $file->storeAs('public/photos',$filename);
                        array_push($PhotoString, $filename);
                    }
                    else
                    {
                        return redirect()->back()->with("Error", "Kan de Foto's niet uploaden.");
                    }
                    $i++;
                }
        }
        $PhotoString = serialize($PhotoString);
        $sstring = serialize($sstring);
        Product::insert([
            'leverancier_id'=>$request->leverancier,
            'product_naam'=>$request->prd_naam,
            'product_aantal'=>$request->voorraad,
            'product_prijs'=>$request->prijs,
            'product_merk'=>$request->merk,
            'product_serie'=>$request->prd_serie,
            'product_model'=>$request->model,
            'product_omschrijving'=>$request->productomschrijving,
            'product_extra_informatie'=>$sstring,
            'image'=>$PhotoString,
        ]);

        return redirect('/producten');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $stringarray = Array("Intel® Core™ i7-1065G7 processor (4 cores)");
        // $stringarray = serialize($stringarray);
        // dd($stringarray);
        $products = Product::findOrFail($id);
        $array = unserialize( $products->product_extra_informatie);
        if($products->image != "DefaultProductImage.jpg"){
            $photoarray = unserialize($products->image);
            $products['productHeadimage'] = array_values($photoarray)[0];
        }
        else{
            $photoarray = $products->image;
            $products['productHeadimage'] = $photoarray;
        }
        $products['productimages'] = $photoarray;
        $products['productextrainfo'] = $array;
        $data['products'] = $products;
        return view('Producten.productinfo', $data);
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
