<?php

namespace App\Imports;

use App\product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new product([
            'leverancier_id'=>$row['leverancier'],
            'product_naam'=>$row['prd_naam'],
            'product_aantal'=>$row['voorraad'],
            'product_prijs'=>$row['prijs'],
            'product_merk'=>$row['merk'],
            'product_serie'=>$row['prd_serie'],
            'product_model'=>$row['model'],
            'product_omschrijving'=>$row['productomschrijving'],
            // 'product_extra_informatie'=>$row['sstring'],
            // 'image'=>$row['PhotoString'],
        ]);
    }
}
