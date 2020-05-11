<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using Closure based composers
        view()->composer('inc.NavApp', function ($view) {
            $headerData = DB::table('winkelwagen')
            ->select('products.*', 'winkelwagen.aantal')
            ->join('products', 'product_id', '=', 'products.id')
            ->where('winkelwagen.user_id', '=', Auth::user()->id)
            ->get();
            $totalprijs = 0;
            foreach($headerData as $product){
                $tempprice = $product->aantal * $product->product_prijs;
                $totalprijs += $tempprice;
            }
            $totalprijs = number_format((float)$totalprijs, 2, '.', '');
            $view->headerData = $headerData;
            $view->totalprijs = $totalprijs;

        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}