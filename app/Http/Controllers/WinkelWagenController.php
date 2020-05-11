<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\winkelwagen;
use App\Bestellingen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WinkelWagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(String $product, request $request)
    {
        $aantal = $request->Aantal;
                $getProducten = winkelwagen::where([['Product_id', '=', $product],['user_id', '=', Auth::user()->id]])
                ->limit(1)
                ->get();
            $item = new winkelwagen();
            $item->aantal = $aantal;
            $item->product_id = $product;
            $item->user_id = Auth::user()->id;
            $item->save();
            return redirect('/producten')
            ->with('success','Product succesvol toegevoegd!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $getBasket = DB::table('winkelwagen')
            ->select('products.*', 'winkelwagen.aantal', 'winkelwagen.product_id')
            ->join('products', 'product_id', '=', 'products.id')
            ->where('winkelwagen.user_id', '=', Auth::user()->id)
            ->get();

            $totaalprijs = 0;
            foreach($getBasket as $productprijs){
                $tempprice = $productprijs->aantal * $productprijs->product_prijs;
                $totaalprijs += $tempprice;
            }
            $totaalprijs = number_format((float)$totaalprijs, 2, '.', '');        
            return view('winkelwagen', compact('getBasket', 'totaalprijs'));    
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
    public function update($product, $aantal)
    {   
        if($aantal == 0 ){
            winkelwagen::where([['product_id', $product],['user_id', Auth::user()->id]])->delete();
        }
        else{
            winkelwagen::where([['product_id', $product],['user_id',Auth::user()->id]])->update(['aantal'=> $aantal]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $product, String $aantal)
    {      
        winkelwagen::where([['product_id', $product],['user_id', Auth::user()->id]])->delete();
        return redirect('/winkelwagen')
        ->with('message','Product succesvol verwijderd!');    }
}
