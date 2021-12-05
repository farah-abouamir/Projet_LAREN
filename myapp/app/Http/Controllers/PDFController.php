<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

use Carbon\Carbon;
use App\Models\Demande;


class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $demande=Demande::find($id);
        // share data to view

        // view()->share('Labelfile',$demande);
        $date = Carbon::now()->format('Y-m-d');
          
        $pdf = PDF::loadView('Labelfile',  ['demande' => $demande, 'date'=>$date]);

        $pdf->setPaper('A3', 'landscape');
        return $pdf->download('Label.pdf');
    }
}
