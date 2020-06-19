<?php

namespace App\Exports;

use App\winkelwagen;
use Maatwebsite\Excel\Concerns\FromCollection;

class WinkelWagenExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection($id)
    {
        // SELECT b.*, p.* FROM `bestellingen` b inner JOIN products p on p.id = b.product_id WHERE b.created_at = '2020-05-19 09:25:03'
        $RecentCreated_at = winkelwagen::select('created_at')->distinct()->where('user_id',$id)->orderByRaw('created_at DESC')->get();
        return winkelwagen::select('*')->join('products', 'products.id', '=', 'products.product_id')->where('created_at',$RecentCreated_at)->get();
    }
}
