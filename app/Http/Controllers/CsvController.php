<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\WinkelWagenExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\LaravelCsv\Facades\Csv;
use Illuminate\Support\Facades\Auth;

class CsvController extends Controller
{
    //This function uses Exports\WinkelwagenExport als basis voor exporten naar CSV. 
    public function ExportWinkelwagen()
    {
        return Csv::download(new WinkelWagenExport(auth::user()->id), 'winkelwagen.xlsx');
    }
    //This function uses Import\ProductImport als basis voor Importen van CSV. 
    Public function ImportProduct()
    {

    }
}
