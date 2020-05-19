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
        $sstring = array();
        for ($i=1; $i <= 4; $i++) {
            if ($request->extra_info_[$i] != null){
                array_push($sstring, $request->extra_info_[$i]);
            }
        }
        
        $sstring = serialize($sstring);
        Product::insert([
            'leverancier_id'=>'',
            'product_naam'=>'',
            'product_aantal'=>'',
            'prodcut_prijs'=>'',
            'product_merk'=>'',
            'product_serie'=>'',
            'product_model'=>'',
            'product_omschrijving'=>'',
            'product_extra_informatie'=>$sstring,
        ]);
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
